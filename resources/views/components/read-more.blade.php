@props(['text', 'limit' => 50])

@php
    use Illuminate\Support\Str;
    $shortText = Str::limit($text, $limit, '...');
@endphp

<div>
    <span class="short-text">{{ $shortText }}</span>
    <span class="full-text d-none">{{ $text }}</span>
    
    @if(strlen($text) > $limit)
        <a href="#" class="read-more ">Read More</a>
    @endif
</div>

@push('js-scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".read-more").forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.preventDefault();
                let parent = this.closest("td"); // Fix selector
                parent.querySelector(".short-text").classList.toggle("d-none");
                parent.querySelector(".full-text").classList.toggle("d-none");
                this.textContent = this.textContent === "Read More" ? "Read Less" : "Read More";
            });
        });
    });
</script>
@endpush
