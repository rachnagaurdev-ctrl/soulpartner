<x-mail::message>
# New Form Submission

You have received a new submission for the **{{ $formName }}** form.

<x-mail::table>
| Field | Value |
| :--- | :--- |
@foreach($data as $key => $value)
| **{{ \Illuminate\Support\Str::headline($key) }}** | {{ is_array($value) ? implode(', ', $value) : $value }} |
@endforeach
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
