@section('additional_scripts')
    @parent
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @foreach (['error', 'warning', 'success', 'info'] as $message)
                @if(session($message))
                    Toast.fire({
                        icon: "{{ $message }}",
                        title: "{{ session($message) }}"
                    });
                @endif()
            @endforeach
        });
    </script>
@endsection
