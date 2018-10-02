<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content teal lighten-5">
            <div class="modal-header text-center teal lighten-3">
                <h4 class="modal-title w-100 font-weight-bold"><span class="fa fa-user-plus"></span> Student Register </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<p class="text-center">Note: Only an bonified students of<br> Central Philippine University can register</p>
            <div class="modal-body mx-4">
			    <form action="register.php" method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix"></i>
                        <input class="form-control" type="text" id="idnum" name="idnum" required>
                        <label>ID Number: xx-xxxx-xx</label>
                    </div>
                    <div class="form-group mb-5 pull-right">
                        <button type="submit" class="btn btn-primary" name="register" id="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>