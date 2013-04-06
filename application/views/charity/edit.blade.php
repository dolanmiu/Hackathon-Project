@layout('main')
@section('content')
      <div class="row-fluid">
      <div class="row">
      <form>
        <div class="span10 offset1">
        <h1>Charity Registration</h1>
        <h3>Basic Info</h3>
           <dl class="dl-horizontal">
        <dt>Charity Name</dt>
        <dd> <input type="text" placeholder="Charity Name"></dd>
      </dl>       
          <dl class="dl-horizontal">
        <dt>Street Name</dt>
        <dd> <input type="text" placeholder="11 Blogs Lane"></dd>
            <dt></dt>
        <dd> <input type="text" placeholder="Address"></dd>
            <dt>Town</dt>
        <dd> <input type="text" placeholder="Blog Town"></dd>
            <dt>Postcode</dt>
        <dd> <input type="text" placeholder="W2 HR4"></dd>
      </dl>
          <h3>Extra Bits</h3>
           <dl class="dl-horizontal">
        <dt>Email</dt>
        <dd> <input type="text" placeholder="joe.bloggs@email.com"></dd>
            <dt>Telephone</dt>
        <dd> <input type="text" placeholder="0000-000-000"></dd>
            <dt>Description</dt>
        <dd> <textarea rows="3"></textarea></dd>
            <dt></dt>
        <dd> <button type="submit" class="btn">Submit</button></dd>
      </dl>         
        </div>
        <div class="span1"></div>
      </form>
       </div>
  </div>
@endsection