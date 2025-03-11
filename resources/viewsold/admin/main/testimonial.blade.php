@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->

<section class="home">
    <table id="testimonial_table" class="display">
        <thead>
            <tr>
                <th>Testimonial Images</th>
                <th>Testimonial Text</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be dynamically added here -->
        </tbody>
    </table>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#testimonial_table').DataTable();

        // Function to strip HTML tags from text
        function stripHtmlTags(html) {
            var tmp = document.createElement("DIV");
            tmp.innerHTML = html;
            return tmp.textContent || tmp.innerText || "";
        }

        // Function to add a new row to the table
        function addTableRow(images, text) {
            var row = '<tr>' +
                '<td><img class="testimonial-image" src="' + images + '" width="300px" height="300px" alt=""></td>' +
                '<td><textarea rows="5" cols="50">' + stripHtmlTags(text) + '</textarea></td>' +
                '<td>' +
                '<button class="edit-image-btn">Edit Image</button>' +
                '<button class="edit-text-btn">Edit Text</button>' +
                '</td>' +
                '</tr>';
            $('#testimonial_table tbody').append(row);
        }

        // Populate table with existing data
        var testimonialData = [
            {
                "images": "{{ asset('images_uploade/'.$data->images) }}",
                "text": `{!! $data->text !!}`
            }
            // Add more data objects if needed
        ];

        // Loop through data to add rows to DataTable
        $.each(testimonialData, function(index, testimonial) {
            addTableRow(testimonial.images, testimonial.text);
        });

        // Handle edit image button click
        $(document).on('click', '.edit-image-btn', function() {
            var row = $(this).closest('tr');
            var imageUrl = row.find('.testimonial-image').attr('src');
            var newImageUrl = prompt("Enter new image URL:", imageUrl);
            if (newImageUrl !== null) {
                row.find('.testimonial-image').attr('src', newImageUrl);
            }
        });

        // Handle edit text button click
        $(document).on('click', '.edit-text-btn', function() {
            var row = $(this).closest('tr');
            var textarea = row.find('textarea');
            var currentText = textarea.val();
            var newText = prompt("Enter new testimonial text:", currentText);
            if (newText !== null) {
                textarea.val(newText);
            }
        });
    });
</script>

@endsection
