@extends('dashboard')
@section('sub-content')
@php
$girlInfos = \App\Models\Info::where('type', 'girl')->get()->keyBy('key');
$boyInfos = \App\Models\Info::where('type', 'boy')->get()->keyBy('key');
$bothInfos = \App\Models\Info::where('type', 'both')->get()->keyBy('key');
$story = @$bothInfos['love_story'];
$cardLink = @$bothInfos['card_link']->value;
$invitation = config('data.invitation');
@endphp
<div class = "w-full h-ful">
    <div class="text-red-400 p-10"><a href="/dashboard/submitted" class="text-red-400">LỜI XÁC NHẬN</a></div>

    <div class="w-full p-10">
            <div class="mb-10"><b>Gửi thiệp</b></div>
            <input type="text" name="card_link" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update invitationAction" data-key="card_link" data-type = "both" value = "{{$cardLink}}">
            <div class="flex w-full mt-4">
                <div class="w-full flex items-center flex-wrap text-md">
                    <label class="cursor-pointer">
                        <input type="radio" name="sexCard" value="lrm" class="invitationAction" checked>
                        Nhà gái
                    </label>
                    <div class="w-[30px]"></div>
                    <label class="cursor-pointer">
                        <input type="radio" name="sexCard" value="tnr" class="invitationAction">
                        Nhà trai
                    </label>
                    <select name="invitation" class="mx-10 border px-2 py-1 invitationAction">
                        <option value="custom">Tuỳ chỉnh</option>
                        @foreach($invitation as $key => $value)
                            <option value="{{ $key }}">{{ $value['host'] }} - {{ $value['guest'] }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="host" class="border px-2 py-1 invitationAction customGuest" placeholder = "mình">
                    <input type="text" name="guest" class="border px-2 py-1 invitationAction customGuest" placeholder = "bạn">
                    <input type="text" name="host2" class="border px-2 py-1 invitationAction customGuest" placeholder = "chúng mình">
                    <input type="text" name="guestName" class="border px-2 py-1 invitationAction" placeholder = "tên khách">
                    <div class="mx-4"><b id = "copyLink">{{$cardLink . '?zxcqaz=lrm&edcxsw=both1'}}</b></div>
                    <button class="px-2 py-1 text-white rounded-md" id="copyBtn" style = "background: green;">copy</button>
                </div>
            </div>
        </div>
        <div class="p-10">
        <b>Thông tin</b>
    </div>
    <div class = "w-full h-ful">
        <div class="flex w-full p-10">
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà gái</h3>
                <input type="text" name="girl_name" placeholder = "Tên cô dâu" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="girl_name" data-type = "girl" value = "{{@$girlInfos['girl_name']->value}}">
                <input type="text" name="girl_dad" placeholder = "Bố cô dâu" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="girl_dad" data-type = "girl" value = "{{@$girlInfos['girl_dad']->value}}">
                <input type="text" name="girl_mom" placeholder = "Mẹ cô dâu" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="girl_mom" data-type = "girl" value = "{{@$girlInfos['girl_mom']->value}}">
                <textarea name="girl_info_adr" class="border max-w-[300px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="girl_info_adr" data-type = "girl" placeholder="Thông tin nhà gái">{{@$girlInfos['girl_info_adr']->value}}</textarea>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà trai</h3>
                <input type="text" name="boy_name" placeholder = "Tên chú rể" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="boy_name" data-type = "boy" value = "{{@$boyInfos['boy_name']->value}}">
                <input type="text" name="boy_dad" placeholder = "Bố chú rể" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="boy_dad" data-type = "boy" value = "{{@$boyInfos['boy_dad']->value}}">
                <input type="text" name="boy_mom" placeholder = "Mẹ chú rể" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="boy_mom" data-type = "boy" value = "{{@$boyInfos['boy_mom']->value}}">
                <textarea name="boy_info_adr" class="border max-w-[300px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="boy_info_adr" data-type = "boy" placeholder="Thông tin nhà gái">{{@$boyInfos['boy_info_adr']->value}}</textarea>
            </div>
        </div>
        <div class="w-full p-10">
            <div class="mb-10"><b>Thời gian</b></div>
            <div class="flex w-full">
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà gái</h3>
                <input type="datetime-local" name="girl_time" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="girl_time" data-type = "girl" value = "{{@$girlInfos['girl_time']->value}}">
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="girl_time_text" data-type = "girl" placeholder="Thời gian nhà gái bằng chữ">{{@$girlInfos['girl_time_text']->value}}</textarea>
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="girl_time_text2" data-type = "girl" placeholder="Thời gian nhà gái bằng chữ (lịch âm)">{{@$girlInfos['girl_time_text2']->value}}</textarea>
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà trai</h3>
                <input type="datetime-local" name="boy_time" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update" data-key="boy_time" data-type = "boy" value = "{{@$boyInfos['boy_time']->value}}">
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="boy_time_text" data-type = "boy" placeholder="Thời gian nhà trai bằng chữ">{{@$boyInfos['boy_time_text']->value}}</textarea>
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update mt-4" data-key="boy_time_text2" data-type = "boy" placeholder="Thời gian nhà trai bằng chữ (lịch âm)">{{@$boyInfos['boy_time_text2']->value}}</textarea>
            </div>
            </div>
        </div>
        <div class="w-full p-10">
            <div class="mb-10"><b>Địa điểm</b></div>
            <div class="flex w-full">
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà gái</h3>
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update" data-key="girl_map" data-type = "girl">{{@$girlInfos['girl_map']->value}}</textarea>
                <input type="text" name="girl_map_link" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update max-w-[500px] w-full" data-key="girl_map_link" data-type = "girl" value = "{{@$girlInfos['girl_map_link']->value}}">
            </div>
            <div class="w-1/2 flex flex-col items-center">
                <h3 class="italic">Nhà trai</h3>
                <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update" data-key="boy_map" data-type = "boy">{{@$boyInfos['boy_map']->value}}</textarea>
                <input type="text" name="boy_map_link" class="text-sm rounded-md border px-2 py-1 mt-4 text-input-update max-w-[500px] w-full" data-key="boy_map_link" data-type = "boy" value = "{{@$boyInfos['boy_map_link']->value}}">
            </div>
            </div>
        </div>
        <!-- <form action="{{ route('images.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full p-10">
                <div class="mb-10">Album ảnh</div>
                <input type="file" name="photos[]" multiple class="text-sm rounded-md border px-2 py-1 mt-4">
            </div>
            <input type = "submit" class="text-sm text-white bg-green-500 rounded-md text-center px-2 py-1">upload</input>
        </form> -->
        <div class="w-full p-10">
            <div class="mb-10"><b>Câu chuyện tình yêu</b></div>
            <div class="flex justify-center">
                <textarea name="love_story" class="border max-w-[500px] w-full px-2 py-1 h-[200px] resize-none overflow-y-auto text-input-update" data-key="love_story" data-type="both">{{@$story->value}}</textarea>
            </div>
        </div>
        <div class="w-full p-10">
            <div class="mb-10"><b>Lời tự sự</b></div>
            <div class="flex w-full">
                <div class="w-1/2 flex flex-col items-center">
                    <h3 class="italic">Cô dâu</h3>
                    <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update" data-key="girl_think" data-type = "girl" placeholder="Lời tự của sự cô dâu">{{@$girlInfos['girl_think']->value}}</textarea>
                </div>
                <div class="w-1/2 flex flex-col items-center">
                    <h3 class="italic">Chú rể</h3>
                    <textarea name="" class="border max-w-[500px] w-full px-2 py-1 h-[100px] resize-none overflow-y-auto text-input-update" data-key="boy_think" data-type = "boy" placeholder="Lời tự của sự chú rể">{{@$boyInfos['boy_think']->value}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const infoInputs = document.querySelectorAll('.text-input-update');
    if (infoInputs) {
        infoInputs.forEach(infoInput => {
            console.log();
            infoInput.addEventListener('change', function() {
                if (!infoInput) {
                    return;
                }
                const value = infoInput.value || '';
                const key = infoInput.getAttribute('data-key');
                const type = infoInput.getAttribute('data-type');
                fetch('/dashboard/info/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        key: key,
                        value: value,
                        type: type
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data === 1) {
                        console.log('Updated successfully.');
                    }
                });
            });
        });
    }
    const invitationSelect1 = document.querySelector('select[name="invitation"]');
    if (invitationSelect1) {
        invitationSelect1.addEventListener('change', function() {
            const customGuests = document.querySelectorAll('.customGuest');
            if (invitationSelect1.value === 'custom') {
                customGuests.forEach(customGuest => {
                    customGuest.style.display = 'block';
                });
            } else {
                customGuests.forEach(customGuest => {
                    customGuest.style.display = 'none';
                });
            }
        });
    }
    const inviteElements = document.querySelectorAll('.invitationAction');
    if(inviteElements) {
        inviteElements.forEach(inviteElement => {
            inviteElement.addEventListener('change', function() {
                renderLink();
            });
        });
    }
    const copyBtn = document.querySelector('#copyBtn');
    const renderLink = () => {
        const sexRadios = document.querySelector('input[name="sexCard"]:checked').value || 'lrm';
        const cardLinkInput = document.querySelector('input[name="card_link"]').value || '';
        const guestNameInput = document.querySelector('input[name="guestName"]').value || '';
        const invitationSelect = document.querySelector('select[name="invitation"]').value || 'both1';
        let customData = '';
        if (invitationSelect === 'custom') {
            const customGuest = document.querySelector('input[name="guest"]').value || '';
            const customHost = document.querySelector('input[name="host"]').value || '';
            const customHost2 = document.querySelector('input[name="host2"]').value || '';
            if (customGuest && customHost && customHost2) {
                newCustomHost = encodeURIComponent(customHost);
                newCustomGuest = encodeURIComponent(customGuest);
                newCustomHost2 = encodeURIComponent(customHost2);
                customData = `&host1=${newCustomHost}&guest=${newCustomGuest}&host2=${newCustomHost2}`;
            }
        }
        const copyLink = document.querySelector('#copyLink');
        let link = `${cardLinkInput}?zxcqaz=${sexRadios}&edcxsw=${invitationSelect}`;
        if (customData !== '') {
            link += customData;
        }
        if (guestNameInput && guestNameInput !== '') {
            newName = encodeURIComponent(guestNameInput);
            link += `&ten=${newName}`;
        }
        copyLink.innerHTML = link;
        copyBtn.innerHTML = 'copy';
        copyBtn.style.backgroundColor = 'green';
    };

    copyBtn.addEventListener('click', function() {
        const copyLink = document.querySelector('#copyLink');
        const el = document.createElement('textarea');
        const link = copyLink.innerHTML.replace(/&amp;/g, '&')
        el.value = link;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        copyBtn.innerHTML = 'copied';
        copyBtn.style.backgroundColor = 'gray';
    });
</script>
@endsection
