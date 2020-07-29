<html>
    {{$leads->industries->name}}
    @foreach ($leads->contacts as $contact)
        {{$contact->gelar}}
    @endforeach
</html>