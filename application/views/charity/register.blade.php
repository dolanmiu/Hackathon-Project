@layout('main')

@section('content')

<div class="row-fluid">
  <div class="row">
    <form action="">
      <div class="span10 offset1">
        <h1>Charity Registration</h1>
        <h3>Basic Info</h3>
        <dl class="dl-horizontal">
          <dt>Charity Name</dt>
          <dd> <input type="text" name='name' placeholder="Charity Name"></dd>
        </dl>       
        <dl class="dl-horizontal">
          <dt>Street Name</dt>
          <dd> <input type="text" name='street_address' placeholder="11 Blogs Lane"></dd>
          <dt>Town</dt>
          <dd> <input type="text" name='city' placeholder="Blog Town"></dd>
          <dt>Postcode</dt>
          <dd> <input type="text" name='postcode' placeholder="W2 HR4"></dd>
        </dl>
        <h3>Extra Bits</h3>
        <dl class="dl-horizontal">
          <dt>Email</dt>
          <dd> <input type="email" name='email' placeholder="joe.bloggs@email.com"></dd>
          <dt>Telephone</dt>
          <dd> <input type="text" name='tel_no' placeholder="0000-000-000"></dd>
          <dt>Description</dt>
          <dd> <textarea rows="3" name='description'></textarea></dd>
          <dt>Upload Logo</dt>
 		  	<dd> <input type="file" name="form[files][]" multiple></dd>
          <dt></dt>
          <dd> <button type="submit" class="btn">Submit</button></dd>
        </dl>         
      </div>
      <div class="span1"></div>
    </form>
  </div>
</div>
@endsection
