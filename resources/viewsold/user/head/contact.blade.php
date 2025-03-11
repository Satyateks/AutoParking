
@extends('components.user.main')
@section('main-container')
    <div class="container contact-main-container pt-4 mb-5">
        <div class="contact-container mb-4">
            <h5>Contact Us</h5>
            <p>Any question or remarks? Just write us a message!</p>
        </div>
        <div class="row justify-content-center">
        <div class="col-lg-10">
        <div class="row contact-row justify-content-right">
            <div class="col-lg-4 contact-column">
                <div class="contact-info">
                    <h5>Contact Information</h5>
                    <p class="note-info">Say something if you have a doubt</p>
                    <li> <a href=""><i class="fa-solid fa-phone-volume"></i>&nbsp;&nbsp; +1012 3456 789 </a> </li>
                    <li> <a href=""><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp; demo@gmail.com</a> </li>
                    <li> <a href=""><i class="fa-solid fa-location-dot"></i> &nbsp;&nbsp; 132 Dartmouth Street Boston, Massachusetts 02156 United States</a> </li>

                    <div class="social-iconsbox pt-5 mt-5">
                        <i class="bi bi-twitter me-4"></i>
                        <i class="bi bi-instagram me-4"></i>
                        <i class="bi bi-discord"></i>
                    </div>
                </div>
            </div>
          <div class="col-lg-8 contact-column">
                <form  method="post" action="{{url('contact_post')}}" data-parsley-validate>
                    @csrf
                <div class="contact-form pt-5">
                    <div class="row pt-5">


                        <div class="mb-3  col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name"
                                data-parsley-pattern="^[^0-9]+$"
                                data-parsley-pattern-message="Please enter a valid name without numbers."
                                placeholder="Enter your name" required data-parsley-whitespace="squish"
                                required maxlength="26" minlength="3"

                                >
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter your email" required data-parsley-whitespace="squish"

                                required maxlength="26" minlength="5"

                                >
                        </div>
                        <div class="mb-3 col-lg-6 pt-5">
                            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone"
                                data-parsley-pattern="^\d{10}$"
                                 placeholder="Enter your phone number"  required data-parsley-whitespace="squish"
                                 required maxlength="15" minlength="7"
                                onkeypress="return event.charCode>=48 && event.charCode<=57;"
                                 >
                        </div>
                        <div class="mb-3 col-lg-6 pt-5">
                            <label for="exampleInputEmail1" class="form-label">Property Space Name</label>
                            <input type="text" class="form-control"  name="space"
                                    data-parsley-length="[1, 50]"
                                    data-parsley-length-message="Property Space Name should be between 1 and 50 characters."
                                    placeholder="Property space name" required data-parsley-whitespace="squish"
                                    required maxlength="150" minlength="0"

                                    >
                        </div>
                        <div class="text-area1 pt-5">
                            <div class="mb-3 col-lg-12">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" placeholder="Write your message" name="message"
                                    data-parsley-length="[1, 1000]"
                                    data-parsley-length-message="Message should be between 1 and 1000 characters."
                                    id="floatingTextarea"  required data-parsley-whitespace="squish"
                                    required maxlength="200" minlength="0"
                                    ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-btn pt-4">
                    <button  class="btn btn-success" style="background-color: #389EEA; color: white;" href="" type="submit">Send Message</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection
