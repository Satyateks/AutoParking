@extends('components.user.main')

@section('main-container')

<div class="container pt-4 pb-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="terms-page">
              {{-- <h4>Privacy Policy</h4>
              <p>
                We respect your privacy. When you give us your personal
                information, we use it only to fulfill the transaction or service
                you have requested.
              </p>
              <p>
                We do not subscribe you to marketing emails without your consent.
                We do not sell or give away your contact information to any other
                entities. We do not allow the vendors who help us process
                transactions to sell or give away your information either. If you
                have questions about how we use your information please contact
                privacy@nngroup.com.
              </p>
              <h4>Detailed Privacy Policy</h4>
              <p>
                <b>1.SCOPE</b> <br />
                This policy applies to personal information collected on websites
                owned or controlled by Nielsen Norman Group (collectively referred
                to in this policy as “we”, "us" or "our"). The aim of this policy
                is to tell you how we will use any personal information we collect
                or you provide through our websites. Please read it carefully
                before you proceed. The data controller in respect of this website
                is Nielsen Norman Group.
              </p>
              <p>
                <b>2.WHAT PERSONAL INFORMATION DO WE COLLECT?</b> <br />
                You do not have to give us any personal information in order to
                use most of this website. However, if you wish to subscribe to our
                newsletter, attend the UX Conference, attend or purchase an Online
                Seminar, purchase a Research Report, or request further
                information, we may collect the following personal information
                from you: name, address, phone number, email address, employment
                details, and employer details. We will also keep a record of any
                financial transaction you make with us but we do not directly
                collect, process or store your debit or credit card information.
                Online payments made through this website are processed securely
                by third party payment providers. <br />
                We use different processors for different types of transactions
                and to manage support for different services. For more information
                about how your data will be handled please refer to the respective
                service provider's privacy policy: Research Report Purchases:
                FastSpring https://fastspring.com/privacy/ Online Seminars:
                Crowdcast, https://www.crowdcast.io/privacy-policy UX Conference
                Payments: Stripe, https://stripe.com/us/privacy In addition, we
                may automatically collect information about the website that you
                came from or are going to. We also collect information about the
                pages of this website which you visit, IP addresses, the type of
                browser you use and the times you access this website. However,
                this information is aggregated across all visitors and we do not
                use it to identify you.
              </p> --}}

              {!! $how_it_work->how_it_work ?? '' !!}
            </div>
          </div>
    </div>
</div>

  @endsection()
