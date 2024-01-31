<h3>Salve</h3>

{{-- @if ()
    
@endif

@unless ()
    
@endunless

@while ()
    
@endwhile --}}

{{-- @isset($record)
    
@endisset

@empty($record)
    
@endempty

@switch($type)
    @case(1)
        
        @break
    @case(2)
        
        @break
    @default
        
@endswitch --}}

{{-- @forelse ($collection as $item)
    
@empty
    
@endforelse --}}



{{-- // Podemos pegar o valor da iteraçao com o $loop->iteration --}}
{{-- 
@foreach ($collection as $item)
    $@if ($loop->last)
        
    @endif
    @if ($loop->first)
       
    @endif

    @php
        $loop->iteration;
    @endphp
@endforeach --}}