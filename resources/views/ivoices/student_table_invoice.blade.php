<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OXU</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
        }
        .index{
            width: 15px;
            text-align: center;
        }

        .student_id{
            width: 50px;
            text-align: center;
        }

        .student_fio{
            width: 100px;
        }
    </style>
</head>
<body>
    <div style="margin-bottom: 10px; text-align: center;">
        <div style="display: inline-block; margin-right: 20px;">
            <img src="{{ asset('logo.png') }}" width="102" height="133" alt="Logotip">
        </div>
        <div style="display: inline-block">
            <h3>OSIYO XALQARO UNIVERSITETI</h3>
            <h3>Ijtimoiy fanlar va texnika fakulteti</h3>
            <h3>Fan nomi ______________________________</h3>
        </div>
    </div>
    <table style="width: 100%">
        <tbody>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <h3 style="font-weight: bold; margin: 5px 0;">{{$direction->title}} yo'nalishi</h3>
                    <h3 style="font-weight: bold; margin: 5px 0;">({{ $students[0]->type_of_education->name }} ta'lim) &nbsp; &laquo;{{$group->title}}&raquo; guruh</h3>
                </td>
            </tr>
            <tr>
                <th class="index">#</th>
                <th class="student_fio" style="text-align: center">F.I.SH</th>
                <th class="student_id">ID</th>
            </tr>
            @foreach($students as $student)
                <tr>
                    <td class="index">{{ $loop->index+1 }}</td>
                    <td class="student_fio">&nbsp;&nbsp;&nbsp;{{ $student->full_name }}</td>
                    <td class="student_id">{{ $student->student_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="width: 100%; display: grid; grid-template-columns: repeat(2, 1fr); margin-top:40px;">
        <div style="display: inline-block">
            <h3 style="margin: 0;padding: 0;">
                Fakultet dekani
            </h3>
        </div>
        <div style="text-align: right; margin-top: -24px;">
            <h3 style="margin: 0;padding: 0;">
                {{ \Illuminate\Support\Facades\Auth::user()->full_name }}
            </h3>
        </div>
    </div>
</body>
</html>
