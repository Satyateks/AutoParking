

@extends('components.user.main')
@section('main-container')

<style>


    .confirmation-icon {
        font-size: 48px;
        color: #4CAF50;
        margin-bottom: 20px;
    }
.modal-body h4{
    color: var(--333333, #333);
    text-align: center;
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    font-style: normal;
    font-weight: 600;
    line-height: 130%; /* 31.2px */
}
.modal-body p{
color: var(--333333, #333);
text-align: center;
font-family: 'Montserrat', sans-serif;
font-size: 16px;
font-style: normal;
font-weight: 400;
line-height: 150%; /* 24px */
}

.star-class{
display: flex;
justify-content: center;
}
.star-class i{
color: #389EEA;
font-size: 25px;
margin: 0 5px;
}
.feedback-box label{
color: #000;
text-align: center;
font-family: 'Euclid Circular A' , sans-serif;
font-size: 15px;
font-style: normal;
font-weight: 500;
line-height: 150%; /* 22.5px */
}
.submit-btn{
display: flex;
justify-content: end;
}
</style>


<div class="container pt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="wrapperAlert">
          <div class="contentAlert">
            <div class="topHalf">
              <p>
                <svg viewBox="0 0 512 512" width="80" title="check-circle">
                  <path
                    d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                  />
                </svg>
              </p>
              <h1>Payment Successfull</h1>

              <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
            </div>

            <div class="bottomHalf">
              <p>You are just one step away from using our services</p>


              <button type="button" class="btn-continue"  data-bs-toggle="modal" data-bs-target="#exampleModal" >
                Rate Booking
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body">

                <h4>How many stars would you like to give them?</h4>
                <p>Hey {{ Auth::user()->name }}! Your parking was successful. How would you like to rate us?</p>
                <div class="star-class" id="starRating">
                    <i class='bx bx-star' data-star='1'></i>
                    <i class='bx bx-star' data-star='2'></i>
                    <i class='bx bx-star' data-star='3'></i>
                    <i class='bx bx-star' data-star='4'></i>
                    <i class='bx bx-star' data-star='5'></i>
                </div>
                <form action="{{url('rating_parking_direct')}}" method="POST">
                    @csrf
                    <div class="mb-3 pt-4 feedback-box">
                        <label for="" class="mb-1">Feedback</label>
                        <input type="hidden" id="parking_id" name="order_id" value="{{session('reting_order_id')}}">
                        <input type="hidden" id="ratingInput" name="rating" value="1">
                        <textarea class="form-control" placeholder="Share your feedback...." id="feedback" name="feedback" style="height: 100px" required>Parking facility very well</textarea>
                    </div>
                    <div class="modal-footer">
                      <div class="submit-btn">
                          <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                      </div>
                      <div class="text-end skip-btn">
                        <button class="btn btn-primary"><a href="{{url('booking')}}">Skip</a></button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      {{-- modal --}}
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
            const starRating = document.getElementById("starRating");
            const stars = starRating.querySelectorAll(".bx");
            stars.forEach(star => {
                star.addEventListener("click", () => {
                    const starValue = star.getAttribute("data-star");
                    updateStars(starValue);
                });
            });
            function updateStars(selectedStar) {
                stars.forEach(star => {
                    const starNumber = star.getAttribute("data-star");
                    if (starNumber <= selectedStar) {
                        star.className = "fa-solid fa-star";
                    } else {
                        star.className = "bx bx-star";
                    }
                });
                document.getElementById("ratingInput").value = selectedStar;
            }
        });

    </script>
<script>
    function open_rating(data){
            document.getElementById('parking_id').value = data.parking_id;
            document.getElementById('orderid').value = data.id;
        }
</script>
    @endsection()
