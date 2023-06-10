<div class="p-3">
    <div class="text-center">
        <h4 class="text-dark mb-4">Add User</h4>
    </div>
    <hr>
    <br>
    <form class="user" id="register_form" method="post" novalidate>

        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">

                <input class="form-control form-control-user" type="text" id="first_name" placeholder="First Name"
                    name="first_name">
            </div>
            <div class="col-sm-6">

                <input class="form-control form-control-user" type="text" id="last_name" placeholder="Last Name"
                    name="last_name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 mb-3 mb-sm-0">

                <input class="form-control form-control-user" type="text" id="cin" placeholder="Cin" name="cin">
            </div>
            <div class="col-sm-6">

                <input class="form-control form-control-user" type="text" id="phone" placeholder="Phone number"
                    name="phone">
            </div>
        </div>

        <div class="mb-3">

            <input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp"
                placeholder="Email" name="email">
        </div>

        <div class=" mb-3">


            <input class="form-control form-control-user" type="password" id="password" placeholder="Password"
                name="password">


        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="formCheck" name="formCheck">
                <label class="form-check-label" for="formCheck">
                    <strong>Admin Access</strong>
                </label>
            </div>
        </div>
        <hr>
        <br>
        <div class="d-sm-flex justify-content-between align-items-center my-2">
            <button class="btn btn-primary btn-user w-50" type="submit" name="add">add user</button>
            <button id="hideModalButton" class="btn btn-secondary btn-user w-400">Cancel</button>
        </div>
    </form>
</div>