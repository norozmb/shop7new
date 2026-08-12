<?php
// include './admin/config.php';
include './header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$contact_msg = "";
$contact_type = "success";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, trim($_POST["name"] ?? ''));
    $email = mysqli_real_escape_string($con, trim($_POST["email"] ?? ''));
    $subject = mysqli_real_escape_string($con, trim($_POST["subject"] ?? ''));
    $message = mysqli_real_escape_string($con, trim($_POST["message"] ?? ''));

    if (empty($name) || empty($email) || empty($message)) {
        $contact_msg = "Please fill out all required fields.";
        $contact_type = "danger";
    } else {
        $query = "INSERT INTO a (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $contact_msg = "Thank you! Your message has been sent successfully.";
            $contact_type = "success";
        } else {
            $contact_msg = "There was an error sending your message. Please try again.";
            $contact_type = "danger";
        }
    }
}
?>

<div class="container col-7 mtop py-4">
    <div class="container mar mb-4">
        <div class="row">
            <div class="col">
                <div class="shopping-cart text-center">
                    <h1 class="text-center text-primary">Contact Sound Museo</h1>
                    <p class="text-muted">Have a question about studio mics, equipment, or orders? Send us a message!</p>
                </div>
            </div>
        </div>
    </div>
   
    <?php if (!empty($contact_msg)) : ?>
        <div class="alert alert-<?php echo $contact_type; ?> alert-dismissible fade show text-center" role="alert">
            <?php echo htmlspecialchars($contact_msg); ?>
        </div>
    <?php endif; ?>

    <form action="contact.php" method="post" class="card p-4 shadow-sm border-0 mb-5">
        <div class="mb-3">
            <label for="name" class="form-label font-weight-bold">Your Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label font-weight-bold">Your Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label font-weight-bold">Subject</label>
            <input type="text" name="subject" class="form-control" id="subject">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label font-weight-bold">Your Message</label>
            <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block py-2">Submit Message</button>
    </form>
</div>
<?php
include './footer.php';

?>