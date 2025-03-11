<style>
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

@extends('components.user.main')
@section('main-container')





<div class="container mb-4">
    <div class="row">
        <div class="table-box">
            <div class="pt-4" style="overflow-x: auto;">
                <div class="filter-box">
                    <h5>Recent Order</h5>
                    <p>Check your order here</p>
                    {{-- <div class="new-filter">
                        <div class="d-flex">
                            <input class="search" type="search" placeholder="Search...">
                        </div>
                    </div> --}}

                <table id="example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Address</th>
                        <th>ORDER ID</th>
                        <th>CHECKIN DATE</th>
                        <th>CHECKOUT OUT</th>
                        <th>PRICE</th>
                        <th>Order Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)

                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order_name }}</td>
                            <td>{{ $item->order_id}}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>{{ $item->delivary_date }}</td>
                            <td>{{$item->order_price}}</td>
                            <td>{{$item->status}}</td>
                            <td><a href="{{$item->invoice}}" download><i class="bi bi-download"></i></a>
                                @if( !isset($item->rating))
                                {{-- <button type="button" class="booking-btn " data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})">
                                    
                                </button> --}}
                                <i class='bx bx-star' data-star='1'  data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})"></i>
                                 <i class='bx bx-star' data-star='1'  data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})"></i>
                                 <i class='bx bx-star' data-star='1'  data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})"></i>
                                 <i class='bx bx-star' data-star='1'  data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})"></i>
                                 <i class='bx bx-star' data-star='1'  data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="open_rating({!! htmlspecialchars(json_encode($item)) !!})"></i>
                                @else
                                 
                                
                                <?php
                                    for ($i = 1; $i <= $item->rating; $i++) {
                                        echo "<i class='fa-solid fa-star' data-star='{$i}'></i>";
                                    }
                                ?>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                </table>
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
                <p>Hey Akash! Your parking was successful. How would you like to rate us?</p>
                <div class="star-class" id="starRating">
                    <i class='bx bx-star' data-star='1'></i>
                    <i class='bx bx-star' data-star='2'></i>
                    <i class='bx bx-star' data-star='3'></i>
                    <i class='bx bx-star' data-star='4'></i>
                    <i class='bx bx-star' data-star='5'></i>
                </div>
                <form action="{{url('rating_parking_space')}}" method="POST">
                    @csrf
                    <div class="mb-3 pt-4 feedback-box">
                        <label for="" class="mb-1">Feedback</label>
                        <input type="hidden" id="parking_id" name="parking_id" value="">
                        <input type="hidden" id="orderid" name="orderid" value="">
                        <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" id="ratingInput" name="rating" value="1">
                        <textarea class="form-control" placeholder="Share your feedback...." id="feedback" name="feedback" style="height: 100px" required>Parking Facility Very Well</textarea>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
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

