<form action="{{ route('borrower-slips') }}" method="GET">
    @csrf
    <div class="mb-3">
        <label for="book_id">Book ID</label>
        <input type="number" name="book_id" id="book_id" class="form-control" value="{{old('book_id')}}" required> 
        <br>
        @error('book_id') <span class="text-danger">{{$message}}</span>  @enderror        
       
    </div>

    <div class="mb-3">
        <label for="user_id">User ID</label>
        <input type="number" name="user_id" id="user_id" class="form-control" value="{{old('user_id')}}" required> 
        <br>
        @error('user_id') <span class="text-danger">{{$message}}</span>  @enderror        
       
    </div>

    <div class="mb-3">
        <label for="borrow_date">Borrow Date</label>
        <input type="number" name="borrow_date" id="borrow_date" class="form-control" value="{{old('borrow_date')}}" required> 
        <br>
        @error('borrow_date') <span class="text-danger">{{$message}}</span>  @enderror        
       
    </div>

    <div class="mb-3">
        <label for="return_date">Return Date</label>
        <input type="number" name="return_date" id="return_date" class="form-control" value="{{old('return_date')}}" required> 
        <br>
        @error('return_date') <span class="text-danger">{{$message}}</span>  @enderror        
       
    </div>




{{-- 
    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="number" name="user_id" id="user_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="borrow_date">Borrow Date</label>
        <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="return_date">Return Date</label>
        <input type="date" name="return_date" id="return_date" class="form-control" required>
    </div> --}}

    {{-- <button type="submit" class="btn btn-primary">Create Borrower Slip</button> --}}
    <a  href="{{url('/')}}" class="btn btn-primary float-end"> Back </a>
{{--     
</form>

