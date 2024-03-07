
@extends('dashboard')
@section('sub-content')
    <div class="w-full justify-center p-10">
        <div class="text-red-400"><a href="/dashboard/home" class="text-red-400">HOME</a></div>
        <table class="p-2 w-full mt-10">
            <thead>
                <tr>
                    <td><b>STT</b></td>
                    <td><b>Tên</b></td>
                    <td><b>Tên gốc</b></td>
                    <td><b>Tin nhắn</b></td>
                    <td><b>Xác nhận</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from your data source and loop through it
                $data = \App\Models\Submited::all();
                foreach ($data as $stt => $row) {
                    ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $row['gname']; ?></td>
                        <td><?php echo $row['gsubmit']; ?></td>
                        <td><?php echo $row['gmessage']; ?></td>
                        <td><?php echo $row['goriginname']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
@endsection

