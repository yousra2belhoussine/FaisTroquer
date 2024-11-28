<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id" name="id" value="{{request()->id}}">
        <input type="hidden" id="msgId" name="msgId" value="{{request()->msgId}}">
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

@if (!request()->msgId)
<script>
    $(document).ready(function () {
        $(".send-button").on("click", function () {
            @php 

            @endphp
        });
    });
</script>                       

@endif
