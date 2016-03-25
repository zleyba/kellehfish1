<?php
/**
 * require all composer dependencies; requiring the autoload file loads all composer packages at once
 * while this is convenient, this may load too much if your composer configuration grows to many classes
 * if this is a concern, load "/vendor/swiftmailer/autoload.php" instead to load just SwiftMailer
 **/
require_once(dirname(dirname(__DIR__)) . "/vendor/autoload.php");
//prepare an emptry reply
$reply = new stdClass();
$reply->status = 200;
try {
	// verify XSRF here
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	// sanitize the inputs from the form: name, email, subject, and message
	// this assumes jQuery (not Angular will be submitting the form, so we're using the $_POST superglobal
	$requestContent = file_get_contents("php://input");
	$requestObject = json_decode($requestContent);
	$product = filter_var($requestObject->product, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$name = filter_var($requestObject->name, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$email = filter_var($requestObject->email, FILTER_SANITIZE_EMAIL);
	$phone = filter_var($requestObject->phone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$website = filter_var($requestObject->website, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$comment = filter_var($requestObject->comment, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	// create Swift message
	$swiftMessage = Swift_Message::newInstance();
	// attach the sender to the message
	// this takes the form of an associative array where the Email is the key for the real name
	$swiftMessage->setFrom([$email => $name]);
	/**
	 * attach the recipients to the message
	 * notice this an array that can include or omit the the recipient's real name
	 * use the recipients' real name where possible; this reduces the probability of the Email being marked as spam
	 **/
	$recipients = ["mtvzach@gmail.com" => "Kelly Williams"];
	$swiftMessage->setTo($recipients);
	// attach the subject line to the message
	$swiftMessage->setSubject("{KellehfishDotNet: Comment Form}");
	/**
	 * attach the actual message to the message
	 * here, we set two versions of the message: the HTML formatted message and a special filter_var()ed
	 * version of the message that generates a plain text version of the HTML content
	 * notice one tactic used is to display the entire $confirmLink to plain text; this lets users
	 * who aren't viewing HTML content in Emails still access your links
	 **/
	$message = <<< EOF
Name: $name<br>Email: $email<br>Phone: $phone<br>Current Site: $website<br><br>Product: $product<br>Message: $comment
EOF;
	$swiftMessage->setBody($message, "text/html");
	$swiftMessage->addPart(html_entity_decode($message), "text/plain");
	/**
	 * send the Email via SMTP; the SMTP server here is configured to relay everything upstream via CNM
	 * this default may or may not be available on all web hosts; consult their documentation/support for details
	 * SwiftMailer supports many different transport methods; SMTP was chosen because it's the most compatible and has the best error handling
	 * @see http://swiftmailer.org/docs/sending.html Sending Messages - Documentation - SwitftMailer
	 **/
	$smtp = Swift_SmtpTransport::newInstance("localhost", 25);
	$mailer = Swift_Mailer::newInstance($smtp);
	$numSent = $mailer->send($swiftMessage, $failedRecipients);
	/**
	 * the send method returns the number of recipients that accepted the Email
	 * so, if the number attempted is not the number accepted, this is an Exception
	 **/
	if($numSent !== count($recipients)) {
		// the $failedRecipients parameter passed in the send() method now contains contains an array of the Emails that failed
		throw(new RuntimeException("unable to send email"));
	}
	// report a successful send
	$reply->message = "Your message has been sent. We will get back with you shortly.";
} catch(Exception $exception) {
	$reply->message = $exception->getMessage();
	$reply->status = 500;
}
header("Content-type: application/json");
echo json_encode($reply);