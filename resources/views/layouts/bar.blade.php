<div class="main-bar">
	<b>
	    <p class="hidden-xs hidden-sm main-bar__p">Estas loggeado como:    
	        <span class="user_loggedin">&nbsp;{!!Auth::user()->name!!}</span>
	        @foreach($boxes as $box)
	        <span class="pull-right pr">{{ $box->name }}:<span class="user_loggedin">&nbsp;${{ $box->current_money }}</span></span>
	        @endforeach       
	    </p>
    </b>             
    <span class="pl hidden-md hidden-lg user_loggedin">&nbsp;<b>{!!Auth::user()->name!!}</b><span class="pl">caja chica: $320</span>
</div>