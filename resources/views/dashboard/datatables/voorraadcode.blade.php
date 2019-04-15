@if($voorraadcode == 111)
    <span class="label label-primary">{{ $voorraadcode }}</span>
@elseif($voorraadcode == 666)
    <span class="label label-warning">{{ $voorraadcode }}</span>
@elseif($voorraadcode == 999)
    <span class="label label-danger">{{ $voorraadcode }}</span>
@else
    <span class="label bg-gray">{{ $voorraadcode }}</span>
@endif