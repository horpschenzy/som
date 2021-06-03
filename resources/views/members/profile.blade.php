@extends('members.layouts.app')
@section('content')
 <!-- account setting page start -->

 <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Classroom</h4>
                            <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('member.dashboard')}}">Dashboard</a></li>
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                                <li class="breadcrumb-item active">{{Auth::user()->name}} Profile</li>
                            </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-2 mb-md-0">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills  flex-column mt-md-0 mt-1" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">General</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Change Password</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Info</span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                        <span class="d-none d-sm-block">Settings</span>
                                    </a>
                                </li>
                            </ul>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{asset('assets/images/users/user-4.jpg')}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                        </a>
                                        <div class=" ml-5 mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                <input type="file" id="account-upload" hidden>
                                                <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                            </div>
                                            <p class="text-muted ml-75 mt-50">
                                                <small>Allowed JPG, GIF or PNG. Max
                                                    size of 800kB</small>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- <form novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-username">Firstname</label>
                                                        <input type="text" class="form-control" name="firstname" id="account-username" placeholder="Enter your Firstname"  required data-validation-required-message="This firstname field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">Surname</label>
                                                        <input type="text" class="form-control" name="surname" id="account-name" placeholder="Enter your Surname"  required data-validation-required-message="This name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="granger007@hogward.com" required data-validation-required-message="This email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <p class="mb-0">
                                                        Your email is not confirmed. Please check your inbox.
                                                    </p>
                                                    <a href="javascript: void(0);">Resend confirmation</a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-company">Company</label>
                                                    <input type="text" class="form-control" id="account-company" placeholder="Company name">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <div class="">
                                        <form novalidate action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group ">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" class="form-control" name="lastname" required value="{{ $data->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-username">Firstname</label>
                                                        <input type="text" class="form-control" name="firstname" id="account-username" placeholder="Enter your Firstname"  required data-validation-required-message="This firstname field is required" value="{{ old('firstname') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="othername">Other Name</label>
                                                        <input type="text" class="form-control" name="othername" required value="{{ old('othername') }}">
                                                    </div>
                                                </div>
                                            </div>
                                           <p>*Participants are required to register with their real names</p>
                                           <div class="form-group">
                                              <label for="email">Email</label>
                                              <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                              <label for="phone">Phone Number</label>
                                              <input type="Number" class="form-control" name="phone" required value="{{ old('phone') }}">
                                            </div>
                                            <div class="form-group ">
                                                    <label for="address">Residential Address</label>
                                                    <input type="text" class="form-control" name="address" required value="{{ old('address') }}">
                                            </div>
                                           <div class="form-group">
                                              <label for="first name">State/Country of Residence</label>
                                              <input type="text" class="form-control" name="state" required value="{{ old('state') }}" placeholder="Enter State/Country">
                                           </div>
                                           <div class="form-group">
                                              <label for="exampleFormControlSelect1">Marital status</label>
                                              <select class="form-control"  name="maritalstatus" required>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="separated">Separated</option>
                                              </select>
                                            </div>
                                            <div class="form-group ">
                                              <label for="exampleFormControlSelect1">Gender</label>
                                              <select class="form-control" required name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                              </select>
                                            </div>
                                              <div class="form-group mt-2">
                                                  <label for="bornagain">Are you born again? </label>
                                                  <label class="radio-inline">Yes<input style="margin-right: 5px;" name="born_again" type="radio" value="yes" required></label>
                                                  <label class="radio-inline">No<input style="margin-right: 5px;" name="born_again" type="radio" value="no" required></label>

                                              </div>
                                              <div class="form-group">
                                                  <label for="yearbornagain">When did you get born again?</label>
                                                  <input type="text" class="form-control" name="yearbornagain" value="{{ old('yearbornagain') }}">
                                              </div>
                                              <div class="form-group">
                                                  <label for="spiritfilled">Are you filled with the Holy Ghost with the evidence of speaking in tongues?</label>
                                                  <label class="radio-inline">Yes<input style="margin-right: 5px;" name="holyghost" type="radio" value="yes" required></label>
                                                  <label class="radio-inline">No<input style="margin-right: 5px;" name="holyghost" type="radio" value="no" required></label>
                                              </div>
                                              <div class="form-group">
                                                  <label for="church">Which church do you attend currently? </label>
                                                  <input type="text" class="form-control" name="church" required value="{{ old('church') }}">
                                               </div>
                                            <div class="form-group">
                                              <label for="church">Why do you want to attend School of Ministry?</label>
                                              <input type="text" class="form-control" name="retake" id="church" value="{{ old('retake') }}">
                                           </div>
                                           <div class="form-group">
                                              <label for="church">State your expectation from the course </label>
                                              <input type="text" class="form-control" name="expectation" value="{{ old('expectation') }}"  required>
                                          </div>

                                          <div class="form-group">
                                          <label class="custom-file-label" for="customFile">Upload Picture (MAXIMUM SIZE: 1MB)</label>
                                          <input type="file" class="form" name="picture" id="customFile" required>
                                          </div>

                                          <div class="form"><button class="btn btn-primary btn-sh-primary" type="submit">Submit your Application</button></div>

                                        </form>

                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Old Password</label>
                                                        <input type="password" class="form-control" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">New Password</label>
                                                        <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Retype New
                                                            Password</label>
                                                        <input type="password" name="con-password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">Bio</label>
                                                    <textarea class="form-control" id="accountTextarea" rows="3" placeholder="Your Bio data here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-birth-date">Birth date</label>
                                                        <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" id="account-birth-date" data-validation-required-message="This birthdate field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountSelect">address</label>
                                                    <select class="form-control" id="accountSelect">
                                                        <option>USA</option>
                                                        <option>India</option>
                                                        <option>Canada</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="languageselect2">Languages</label>
                                                    <select class="form-control" id="languageselect2" multiple="multiple">
                                                        <option value="English" selected>English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French">French</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="German">German</option>
                                                        <option value="Arabic" selected>Arabic</option>
                                                        <option value="Sanskrit">Sanskrit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-phone">Phone</label>
                                                        <input type="text" class="form-control" id="account-phone" required placeholder="Phone number" value="(+656) 254 2568" data-validation-required-message="This phone number field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-website">Website</label>
                                                    <input type="text" class="form-control" id="account-website" placeholder="Website address">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="musicselect2">Favourite Music</label>
                                                    <select class="form-control" id="musicselect2" multiple="multiple">
                                                        <option value="Rock">Rock</option>
                                                        <option value="Jazz" selected>Jazz</option>
                                                        <option value="Disco">Disco</option>
                                                        <option value="Pop">Pop</option>
                                                        <option value="Techno">Techno</option>
                                                        <option value="Folk" selected>Folk</option>
                                                        <option value="Hip hop">Hip hop</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="moviesselect2">Favourite movies</label>
                                                    <select class="form-control" id="moviesselect2" multiple="multiple">
                                                        <option value="The Dark Knight" selected>The Dark Knight
                                                        </option>
                                                        <option value="Harry Potter" selected>Harry Potter</option>
                                                        <option value="Airplane!">Airplane!</option>
                                                        <option value="Perl Harbour">Perl Harbour</option>
                                                        <option value="Spider Man">Spider Man</option>
                                                        <option value="Iron Man" selected>Iron Man</option>
                                                        <option value="Avatar">Avatar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                    <form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-twitter">Twitter</label>
                                                    <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-facebook">Facebook</label>
                                                    <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-google">Google+</label>
                                                    <input type="text" id="account-google" class="form-control" placeholder="Add link">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-linkedin">LinkedIn</label>
                                                    <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-instagram">Instagram</label>
                                                    <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-quora">Quora</label>
                                                    <input type="text" id="account-quora" class="form-control" placeholder="Add link">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- account setting page end -->

@endsection
@push('scripts')

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

@endpush
