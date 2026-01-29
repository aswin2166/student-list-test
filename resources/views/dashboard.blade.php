<style>
     .custom-table {
        width: 80%;
        border-collapse: collapse;
        margin:auto;
        font-family: Arial, sans-serif;
    }

    .custom-table td {
        padding: 5px;
        border: 1px solid #ddd;
        text-align: left;
        
    }
    .custom-table th {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }
    .custom-table thead {
        background-color: #1f2937;
        color: white;
        
    }
    .btn {
        width: 150px;
        display: block;
        padding: 8px 14px;
        background-color: blue;
        color: #ffffff;
        border-radius: 4px;
        font-weight: 500;
        text-decoration: none;
    }
    .btn:hover {
        background-color: green;
    }
</style>
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn">
                        <a href="{{ route('students.create') }}">
                        Add New Student
                        </a>
                    </button>  
                    <br><br>
                    <table class='custom-table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students->where('status', 1) as $student)
                            <tr id="row-{{ $student->id }}">
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->course}}</td>
                                <td>
                                    <form action="{{route('students.edit', $student->id) }}" method='GET'>
                                        <button type='submit' class='btn'>Edit</button>
                                    </form>

                                    <button onclick="deleteStudent({{$student->id}})" class='btn'>Delete</button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    function deleteStudent(id){

        if(!confirm("Delete this Student?")) return;

        $.ajax({
            url:"students/delete/" + id,
            type: "DELETE",
            data:{
                _token:"{{ csrf_token() }}"
            },
            success: function(){
                $('#row-'+ id).fadeOut();
            },
            error: function(xhr) {
            alert("Delete failed!");
            console.log(xhr.responseText);
        }
        });
    }
</script>