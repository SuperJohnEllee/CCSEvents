<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content teal lighten-5">
            <div class="modal-header text-center teal lighten-3">
                <h4 class="modal-title w-100 font-weight-bold"><span class="fa fa-mobile"></span> Contact Us</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <p class="text-center">Contact us for more information or you can contact us for reservation</p>
            <div class="modal-body mx-3">
            <form method="post">
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix text-dark"></i>
                    <input type="text" id="name" name="name" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="user">Name</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix text-dark"></i>
                    <input type="email" id="email" name="email" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="email">Email</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fa fa-tag prefix text-dark"></i>
                    <input type="text" id="subject" name="subject" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="subject">Subject</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-pencil prefix text-dark"></i>
                    <textarea type="text" id="message" name="message" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="message">Your message</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-success" name="btn_send"> Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php
    
    include('connection.php');

    if (isset($_POST['btn_send'])) {
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $feedback_sql = "INSERT INTO feedback(Name, Email, Subject, Message, DateSend)
        VALUES('$name', '$email', '$subject', '$message', NOW());";
        $feedback_res = mysqli_query($conn, $feedback_sql);

        if ($feedback_res) {
            
            echo "<script> 
                    alert('Feedback sent successfully');
                </script>";
        } else {
            
            echo "<script>
                    alert('Failure in sending a feedback');
                </script>";
        }
    }
?>