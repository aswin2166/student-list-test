<style>
    .btn {
        width: 100px;
    display: inline-block;
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
                   <h2>Create  New Students Data</h2> <br>
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <label for="name">Name : </label>
                        <input type='text' name="name" ><br>
                        <label for="email">Email : </label>
                        <input type='email' name="email" ><br>
                        <label for="course">Course</label>
                        <input type='text' name="course"><br><br>

                        <button class="btn">Save</button>
                   </form>   
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
