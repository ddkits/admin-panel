@inject('userGet','App\User')
<div style="float:right">
    <div class="dropdown">
        <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
            <i class="now-ui-icons ui-1_simple-add"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="/proxy/{{ $tables->path }}/app/create">Add New App</a>
        </div>
    </div>

</div>
<div class="row" style="margin: 1px;">
    
    @foreach($allowedUsers as $key => $value)
     {{--  Access permissions  --}}
     {!! Form::open(array('route' => 'rest.access.proxies', 'method'=>'post' ,'files'=>'true', 'class'=>'form-group col-md-12')) !!}
     
     <table class="table table-borderded table-striped">
      <tbody> 
        <tr>
        <td>{{ $usList[$value] }}  {{ Form::number('uid', $value, ['hidden'])}} {!! Form::hidden('tableIs', $tables->path) !!}</td>
        @foreach ($usersAccessList as $item)
            @if (isset($key) && isset($item['uid']) && $key == $item['uid'])
            <td><p>Get: {{ Form::select($item['uid'].'-get', [0=>'Not Allowed',1=>'Allowed'], $item['get'],array('name'=>$item['uid'].'-get','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                <p>Get Limit: {{ Form::number($item['uid'].'-get-assign', $item['get_assign'],array('name'=>$item['uid'].'-get-assign','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                @php
                 ($item['get_used'] >= $item['get_assign']) ? $getUsed = '**'.$item['get_used'].'**' : $getUsed =$item['get_used'] ;
                @endphp
                <p>Get Used: {{ $getUsed }} </td>
                
            <td><p>Post: {{ Form::select($item['uid'].'-post', [0=>'Not Allowed',1=>'Allowed'], $item['post'],array('name'=>$item['uid'].'-post','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                <p>Post Limit: {{ Form::number($item['uid'].'-post-assign', $item['post_assign'],array('name'=>$item['uid'].'-post-assign','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                @php
                 ($item['post_used'] >= $item['post_assign']) ? $postUsed = '**'.$item['post_used'].'**' : $postUsed =$item['post_used'] ;
                @endphp
                <p>Post Used: {{ $postUsed }} </td>

            <td><p>Put/Patch: {{ Form::select($item['uid'].'-update', [0=>'Not Allowed',1=>'Allowed'], $item['update'],array('name'=>$item['uid'].'-update','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                <p>PP Limit: {{ Form::number($item['uid'].'-update-assign', $item['update_assign'],array('name'=>$item['uid'].'-update-assign','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                @php
                ($item['update_used'] >= $item['update_assign']) ? $ppUsed = '**'.$item['update_used'].'**' : $ppUsed =$item['update_used'] ;
               @endphp
               <p>PP Used: {{ $ppUsed }} </td>

            <td><p>Delete: {{ Form::select($item['uid'].'-delete', [0=>'Not Allowed',1=>'Allowed'], $item['delete'],array('name'=>$item['uid'].'-delete','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                <p>Delete Limit: {{ Form::number($item['uid'].'-delete-assign', $item['delete_assign'],array('name'=>$item['uid'].'-delete-assign','id'=>'tags', 'class'=>'form-control select2'))}}</p>
                @php
                ($item['delete_used'] >= $item['delete_assign']) ? $deleteUsed = '**'.$item['delete_used'].'**' : $deleteUsed =$item['delete_used'] ;
               @endphp
               <p>Delete Used: {{ $deleteUsed }} </td>
                @php $n = $key; $nid = $item['api_id']; @endphp
               <td style="font-size:10px;flex-wrap: wrap;"><a id="clicktoshow" style="color:white;font-size:14px;flex-wrap: wrap;" class="btn btn-success"  show="<?php echo $n.''.$nid ?>">Show Key</a><br>
                <div style="position:absolute"><span class="tokens" id="<?php echo $n.''.$nid ?>" style="display: none;margin:0;padding:10px;position:fixed;left:30%;bottom:10%;background:white;box-shadow:10px;z-index:10;max-width:50%;border:1px solid black">{{ $item['api_id'] }}</span></div>
            </td>
            @endif
        @endforeach
        </tr>
      
      </tbody>
    </table>
    
    @endforeach
    {{--  <small>1: Allowed, 0: Not Allowed</small>  --}}
    <div class="">{{ Form::submit('Save Proxy Access Permissions', ['class' => 'btn btn-success']) }}</div>
    {!! Form::close() !!}
</div>
