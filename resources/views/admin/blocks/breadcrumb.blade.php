  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="">{{$breadcrumb[0]}}</a>
        </li>
        @for($i=1;$i<count($breadcrumb);$i++)
        	<li class="breadcrumb-item active">{{$breadcrumb[$i]}}</li>
  		@endfor
      </ol>