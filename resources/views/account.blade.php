<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Your CSS styles here */
	
    /* Custom Styles */
    .item {
      margin-bottom: 30px;
    }
	.card item {
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 30px;
    }
    .btn-custom {
      background-color: #df7e64;
      border-color: #df7e64;
      color: #415a77;
    }
    .btn-custom:hover {
      background-color: #df7e64;
      border-color: #df7e64;
      color: #ffffff;
    }
    .col-md-8 {
        margin-top:2rem;
    }

    .profile-pic {
        width: 100px;
        height: 100px; /* Set the height equal to the width */
        text-align: center;
        border-radius: 50%; /* Make it a circle */
        overflow: hidden; /* Hide overflowing parts */
        display:block;
        border: solid 2px black;
    }


    .img-fluid {
        width: 100px;
        height: 100px;
        display: block; /* Ensure the image behaves as a block element */
        margin-left: auto; /* Auto margin for left and right */
        margin-right: auto;
        object-fit: cover;
    }

    #accountdetails {
        padding: 0 20px;
    }

    .form-group.row {
        display: flex;
        justify-content:center;
        margin-bottom:0;
    }

  </style>
</head>
<body>
<header>
    @include('navbar')
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <div class="text-center">
                        <!-- Check if the user has a profile picture -->
                        @if(Auth::user()->profile_picture)
                            <!-- If the user has a profile picture, display the current picture -->
                            <div class="profile-pic center mb-3">
                                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile Picture" class="img-fluid" id="profile-pic">
                            </div>

                            <!-- Display button to update profile picture -->
                            <form id="update-profile-form" method="POST" action="{{ route('upload.profile.picture') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profile-picture-input" name="profile_picture">
                                    <label class="custom-file-label" for="profile-picture-input">Choose file</label>
                                </div>
                                <button type="submit" class="btn btn-custom mt-3">Update Profile Picture</button>
                            </form>
                        @else
                            <!-- If the user doesn't have a profile picture, display a placeholder image -->
                            <div class="profile-pic mb-3">
                                <img src="{{ asset('images/placeholderprofile.jpeg') }}" alt="Placeholder Profile Picture" class="img-fluid" id="profile-pic">
                            </div>
                            <!-- Display button to add profile picture -->
                            <form id="add-profile-form" method="POST" action="{{ route('upload.profile.picture') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profile-picture-input" name="profile_picture">
                                    <label class="custom-file-label" for="profile-picture-input">Choose file</label>
                                </div>
                                <button type="submit" class="btn-custom mt-3">Add Profile Picture</button>
                            </form>
                        @endif
                    </div>                               
                    <div class="form-group row">
                        <label for="businessname" class="col-md-4 col-form-label text-md-center">{{ $user->business_name }}</label>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-center">Name: {{ $user->name }}</label>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-center">Email: {{ $user->email }}</label>
                    </div>
                    <!-- Display user's listings -->
                    @include('userlistings')

                </div>
            </div>
        </div>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
