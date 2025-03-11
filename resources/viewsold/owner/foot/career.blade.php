@extends('components.user.main')
@section('main-container')

    <div class="carrer-banner">
      <img src="images/career.png" alt="" />
    </div>

    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="carrer-content">
            <h4>BeNefits</h4>
            <h5>Why you Should Join Our Awesome Team</h5>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using 'Content here,
              content here', making it look like readable English.
            </p>
          </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-6">
                    <div class="carrer-opt">
                        <img src="images/car.png" alt="" />
                        <div class="pt-3">
                          <h6>Team work</h6>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry.
                          </p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="carrer-opt">
                        <img src="images/car1.png" alt="" />
                        <div class="pt-3">
                          <h6>Secured Future</h6>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry.
                          </p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-6 pt-4">
                    <div class="carrer-opt">
                        <img src="images/car2.png" alt="" />
                        <div class="pt-3">
                          <h6>Learning Opportunity</h6>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry.
                          </p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-6 pt-4">
                    <div class="carrer-opt">
                        <img src="images/car3.png" alt="" />
                        <div class="pt-3">
                          <h6>Upgrate Skills</h6>
                          <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry.
                          </p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
      <div class="row justify-content-center pt-5">
        <div class="col-lg-10">
            <div class="resume-cv">
                <p>You do not have to give us any personal information in order to use most of this website.
                    However, if you wish to subscribe to our newsletter,
                    attend the UX Conference, attend or purchase an Online Seminar, purchase a Research Report, or request further information, we may
                    collect the following personal information from you: name, address, phone number, email address, employment details, and employer details.
                    We will also keep a record of any financial transaction you make with us but we do not directly collect, process or store your debit or credit
                    card information. Online payments made through this website are processed securely by third party payment providers.

                    </p>
            </div>
        </div>
      </div>
      <div class="row justify-content-center pb-5">
        <div class="col-lg-5 resume-cv">
            <label for="">Resume/CV * <small>(PDF, Word, 5mb maximum)</small></label>
            <input type="file" class="form-control mt-2">
           <div class="resume-btn">
            <button class="mt-4">Confirm & Submit</button>
           </div>
        </div>
      </div>
    </div>

    @endsection()
