@extends('components.admin.main')

@section('main-container')
<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Testimonial</h5>
            <div class="col-lg-10 maintable-column">
                <div class="add-btntest">
                    <a href="add-test.html"><i class="fa-solid fa-plus"></i> &nbsp; Add New</a>
                </div>
                <div class="container mt-4">
                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img src="images/tess.jpg" width="150" height="120" alt=""></td>
                                <td>John Doe</td>
                                <td>Managing Director, ABC Media</td>
                                <td><a href="edit-test.html"><i class="fa-regular fa-pen-to-square"></i></a> &nbsp;<i
                                        class="fa-solid fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img src="images/tess.jpg" width="150" height="120" alt=""></td>
                                <td>John Doe</td>
                                <td>Managing Director, ABC Media</td>
                                <td><a href="edit-test.html"><i class="fa-regular fa-pen-to-square"></i></a> &nbsp;<i
                                    class="fa-solid fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img src="images/tess.jpg" width="150" height="120" alt=""></td>
                                <td>John Doe</td>
                                <td>Managing Director, ABC Media</td>
                                <td><a href="edit-test.html"><i class="fa-regular fa-pen-to-square"></i></a> &nbsp;<i
                                    class="fa-solid fa-trash"></i></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img src="images/tess.jpg" width="150" height="120" alt=""></td>
                                <td>John Doe</td>
                                <td>Managing Director, ABC Media</td>
                                <td><a href="edit-test.html"><i class="fa-regular fa-pen-to-square"></i></a> &nbsp;<i
                                    class="fa-solid fa-trash"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection()
