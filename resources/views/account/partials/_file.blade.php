@component('files.partials._file',compact('file'))
    @slot('links')
        <div class="level">
            <div class="level-left">
                <p class="level-item">
                    {{ $file->isFree() ? 'Free' : '£'.$file->price}}
                </p>

                @if(!$file->approved)
                    <p class="level-item">
                        Pending Approval
                    </p>
                @endif

                <p class="level-item">
                    {{$file->live ? 'Live' : 'Not Live'}}
                </p>
                <a href="#" class="level-item">Make Changes</a>
            </div>
        </div>
    @endslot
@endcomponent