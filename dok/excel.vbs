Option Explicit

'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                      TUGAS AKHIR                                        %
'   %                                                                                         %
'   %                      ANALISIS FREKUENSI DALAM BIDANG SUMBER DAYA AIR                    %
'   %                               MENGGUNAKAN PROGRAM EXCEL                                 %
'   %                             VISUAL BASIC FOR APPLICATION                                %
'   %                                                                                         %
'   %                                      Disusun Oleh                                       %
'   %                         Nama             : Anang Kurniawan                              %
'   %                         Nim              : 95/104822/ET/00299                           %
'   %                         Jurusan          : Teknik Sipil UGM                             %
'   %                         Dosen Pembimbing : Ir.Djoko Luknanto,M.Sc,Ph.D.                 %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


Const Huruf1 As String = "Arial Narrow", Huruf2 As String = "Comic Sans MS", Huruf3 As String = "Futura Md BT", _
    JumlahDistribusi As Integer = 4
Dim c As Object

Dim BlankString As String, Baku As String, CaraUrutData As String, ChiFuncDist As String, Data As String, _
    FillString As String, JudulData As String, JudulKolomPertama As String, JudulKolomKedua As String, _
    JudulPeluangLapangan As String, JudulPeluangTeoritis As String, JudulUrutanNomer As String, _
    Mean As String, Msg As String, NamaDist As String, Rata As String, _
    SmirFuncDist As String, StandardDev As String

Dim CError As Integer, BanyakData As Integer, JumlahKelas As Integer, JumlahKasus As Integer, JumlahData As Integer, _
    JumlahParameter As Integer, Kelasi As Integer, NomerPertama As Integer, NError As Integer, Probability As Integer

Dim CI As Single, LnCS As Single, LnRerata As Single, LnSimpanganBaku As Single, MyString As Single, _
    SimpanganBaku As Single, Rerata As Single




'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                                                                         %
'   %                                      INPUT DATA                                         %
'   %                                                                                         %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


Sub InputData()
'   Untuk mempersiapkan data debit air yang tercantum dalam lembar kerja "Input Data"
'   Run macro ini ke sel yang berisi data paling awal
    Sheets("Input Data").Activate
    If (ActiveCell.Activate <> Range("A11")) Then
        Set c = Range("A11")
        NError = 0
        If (Range("A11").Value = "") Then
            NError = NError - 1
            Msg = "Data awal anda belum diisi. Isikan data pada sel  A11  kemudian" & _
                " klik tombol 'PROSES'"
            If (MsgBox(Msg, vbOKCancel + vbCritical, "Proyek Tugas Akhir," & _
                " 'Analisis Data Hidrologi' , oleh Anang Kurniawan") = vbOK) Then
                'Sheets("Input Data").Activate
                Range("A11").Select
            Exit Sub
            End If
        Else
         
    '       Memformat bentuk font, ukuran dan warna pada lembar Input Data
            Set c = Range("A11")
            c.Offset(-1, 1).Characters(Start:=11, Length:=1).Font.Superscript = True
            With Range(c, c.End(xlDown))
                With .Font
                    .Bold = False
                    .Name = Huruf1
                    .Size = 10
                End With
                .HorizontalAlignment = xlCenter
                .VerticalAlignment = xlBottom
                .Orientation = 0
            End With
            With Range(c.Offset(0, 1), c.Offset(0, 1).End(xlDown))
                With .Font
                    .Bold = False
                    .Name = Huruf1
                    .Size = 10
                End With
                .NumberFormat = "General"
                .NumberFormat = "#,##0.00____"
                .HorizontalAlignment = xlRight
                .VerticalAlignment = xlBottom
                .Orientation = 0
            End With
            
    '       Tampilkan banyaknya probabilitas yang diinginkan
            With c
                .Offset(-10, 1).Name = "JudulData"
                .Offset(-9, 1).Name = "CaraUrutData"
                .Offset(-7, 1).Name = "JumlahKelas"
                .Offset(-6, 1).Name = "CI"
                .Offset(-4, 1).Name = "JumlahKasus"
                .Offset(-1, 0).Name = "JudulKolomPertama"
                .Offset(-1, 1).Name = "JudulKolomKedua"
                Range(.Offset(0, 2), .Offset((JumlahKasus - 1), 2)).Name = "Probability"
                Range(c, .Offset(0, 1).End(xlDown)).Name = "Data"
            End With
            JumlahKelas = c.Offset(-7, 1).Value
            JumlahKasus = c.Offset(-4, 1).Value
            Range(c.Offset(0, 2), c.Offset((JumlahKasus - 1), 2)).Name = "Probability"
            Set c = ActiveCell
            With Range(c.Offset(0, 2), c.Offset((JumlahKasus - 1), 2))
                .NumberFormat = "##__"
                .HorizontalAlignment = xlCenter
            End With
        End If
   End If
End Sub

    
Sub JudulpadaInputData(JumlahKelas, JudulData, JudulKolomPertama, JudulKolomKedua)
'   Berikan nama pada judul-judul di sheet Input Data
    With Sheets("Input Data")
        JumlahKelas = .Range("B4").Value
        JudulData = .Range("B1").Value
        JudulKolomPertama = .Range("A10").Value
        JudulKolomKedua = .Range("B10").Value
    End With
End Sub


Sub JudulPeluangTeoritik(JudulPeluangTeoritis, JudulPeluangLapangan, JudulUrutanNomer)

'   Berikan judul pada kolom peluang lapangan
    JudulPeluangLapangan = "P = m/(N+1)"
    JudulUrutanNomer = "m"
    If UCase(Range("CaraUrutData")) = "B" Then
            JudulPeluangTeoritis = "P(x >= Xm)"
    ElseIf UCase(Range("CaraUrutData")) = "K" Then
            JudulPeluangTeoritis = "P(x <= Xm)"
    End If
End Sub



'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                     PERHITUNGAN                                         %
'   %                                                                                         %
'   %                                    STATISTIK DASAR                                      %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    


Sub StatistikDasar()
Dim DataKu As Integer, I As Integer, JenisDistribusi As Integer, _
    CS As Single, SelPertama As Single

'   Mengkopi data yang diinginkan  ke lembar kerja "Statistik Dasar"
    Call JudulpadaInputData(JumlahKelas, JudulData, JudulKolomPertama, JudulKolomKedua)
    Range("Data").Copy (Sheets("Statistik Dasar").Range("C4"))
    
    Set c = Sheets("Statistik Dasar").Range("C4")
    BanyakData = Range(c, c.End(xlDown)).Count
    Range(c.Offset(0, 1), c.Offset(0, 1).End(xlDown)).Name = "MyString"
    Range(c, c.Offset(0, 1).End(xlDown)).Name = "DataKu"
    c.Offset(0, 1).Name = "SelPertama"
    With c
        .Offset(-1, 0).Value = JudulKolomPertama
        .Offset(-1, 1).Value = JudulKolomKedua
        .Offset(-1, 2).Value = "Ln " & JudulKolomKedua & ""
        .Offset(-3, -2).Value = "HITUNGAN STATISTIK " & JudulData & ""
        Call JudulPeluangTeoritik(JudulPeluangTeoritis, JudulPeluangLapangan, JudulUrutanNomer)
        .Offset(-1, -1).Value = JudulPeluangLapangan
        .Offset(-1, -2).Value = JudulUrutanNomer
    End With
        
'   Urutkan data dari besar ke kecil atau dari kecil ke besar
    If UCase(Range("CaraUrutData")) = "B" Then
        Range("DataKu").Sort Key1:=Range("SelPertama"), Order1:=xlDescending
    ElseIf UCase(Range("CaraUrutData")) = "K" Then
        Range("DataKu").Sort Key1:=Range("SelPertama"), Order1:=xlAscending
    End If
    
'   Tulis nilai Ln data
    With Sheets("Statistik Dasar").Range("C4")
        With .Offset(0, 2)
            .Formula = "=LN(" & .Offset(0, -1).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            .AutoFill Destination:=Range(c.Offset(0, 2), c.Offset(BanyakData - 1, 2)), Type:=xlFillDefault
        End With
    
        For I = 1 To 2
        '   Tulis jumlah data
            With .Offset(BanyakData + 1, I)
                .Formula = "=COUNT(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
                
        '   Tulis nilai rata-rata
            With .Offset(BanyakData + 2, I)
                .Formula = "=AVERAGE(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
            
        '   Tulis  nilai simpangan baku
            With .Offset(BanyakData + 3, I)
                .Formula = "=STDEV(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
            
        '   Tulis nilai koefisien asimetri (skweness)
            With .Offset(BanyakData + 4, I)
                .Formula = "=SKEW(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
                
        '   Tulis nilai koefisien kurtosis
            With .Offset(BanyakData + 5, I)
                .Formula = "=KURT(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
            
        '   Tulis nilai koefisien variasi
            With .Offset(BanyakData + 6, I)
                .Formula = "=STDEV(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ") / " & _
                    " AVERAGE(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
             End With
             
        '   Tulis nilai tengah (median)
            With .Offset(BanyakData + 7, I)
                .Formula = "=MEDIAN(" & c.Offset(0, I).Address(rowabsolute:=False, columnabsolute:=False) & _
                    ": " & c.Offset(0, I).End(xlDown).Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
        Next I
    
        .Offset(BanyakData + 1, 1).Name = "BanyakData"
        .Offset(BanyakData + 2, 1).Name = "Rerata"
        .Offset(BanyakData + 3, 1).Name = "SimpanganBaku"
        .Offset(BanyakData + 4, 1).Name = "CS"
        .Offset(BanyakData + 2, 2).Name = "LnRerata"
        .Offset(BanyakData + 3, 2).Name = "LnSimpanganBaku"
        .Offset(BanyakData + 4, 2).Name = "LnCS"
        .Offset(BanyakData + 1, 0).Value = "Jumlah Data   ="
        .Offset(BanyakData + 2, 0).Value = "Nilai Rerata (Mean)   ="
        .Offset(BanyakData + 3, 0).Value = "Standar Deviasi   ="
        .Offset(BanyakData + 4, 0).Value = "Koefisien Skewness   ="
        .Offset(BanyakData + 5, 0).Value = "Koefisien Kurtosis   ="
        .Offset(BanyakData + 6, 0).Value = "Koefisien Variasi   ="
        .Offset(BanyakData + 7, 0).Value = "Nilai Tengah   ="
    
'       Tulis nomer urut (rangking data debit)
        .Offset(0, -2).Value = "1"
    
'       Tulis konstanta m/(N+1)
        .Offset(0, -1).Formula = "=(" & .Offset(0, -2).Address(rowabsolute:=False, columnabsolute:= _
                    False) & "/ (BanyakData + 1))"
        Range(.Offset(0, -2), .Offset(0, -1)).AutoFill Destination:=Range(.Offset(0, -2), _
                    .Offset(BanyakData - 1, -1)), Type:=xlFillDefault
        
'       Berikan bentuk font pada tabel statistik dasar
        With Range(.Offset(0, -2), .Offset(BanyakData + 8, 2))
            With .Font
                .Name = Huruf1
                .Size = 10
            End With
            .Interior.ColorIndex = 35
        End With
            
'       Format peluang lapangan rata kanan dengan 3 angka dibelakang koma
        With Range(.Offset(0, -1), .Offset(0, -1).End(xlDown))
            .NumberFormat = "#,##0.000__"
            .HorizontalAlignment = xlRight
        End With
        Range(.Offset(0, -2), .Offset(0, -2).End(xlDown)).NumberFormat = "General__"
             
'       Format hasil perhitungan statistik dasar dengan model huruf, ukuran, dan 3 angka
'       di belakang koma
        With Range(.Offset(0, 1), .Offset(BanyakData + 7, 2))
            With .Font
                .Name = Huruf1
                .Size = 10
            End With
                .NumberFormat = "#,##0.000__"
                .HorizontalAlignment = xlRight
        End With
        Range(.Offset(0, 0), .Offset(BanyakData + 7, 0)).HorizontalAlignment = xlRight
            
'       Format jumlah data menjadi bilangan bulat
        Range(.Offset(BanyakData + 1, 1), .Offset(BanyakData + 1, 2)).NumberFormat = "#,##0__"
        Range(c, c.End(xlDown)).HorizontalAlignment = xlCenter
            
'       Berikan warna, bentuk font, dan garis bawah pada judul
        With .Offset(-3, -2)
            With .Font
                .Name = Huruf2
                .Size = 10
                .Bold = True
            End With
        End With
        With Range(.Offset(-1, -2), .Offset(-1, 2))
            .Interior.ColorIndex = 40
            With .Font
                .Name = Huruf1
                .Size = 11
                .Bold = True
            End With
            .HorizontalAlignment = xlCenter
        End With
        .Offset(-1, 1).Characters(Start:=11, Length:=1).Font.Superscript = True
        .Offset(-1, 2).Characters(Start:=14, Length:=1).Font.Superscript = True
    End With
End Sub


Sub RumusDistribusi(JenisDistribusi As Integer, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
'   Tentukan jenis distribusi
    Select Case JenisDistribusi
'       Berikan nama distribusi
        Case 1
            NamaDist = "NORMAL"
            ChiFuncDist = "NORMINV"
            SmirFuncDist = "NORMDIST"
            Mean = "Rerata"
            StandardDev = "SimpanganBaku"
            Rata = "Rerata"
            Baku = "SimpanganBaku"
            BlankString = ""
            FillString = ",True"
            JumlahParameter = "2"
        Case 2
            NamaDist = "LOG-NORMAL"
            ChiFuncDist = "LOGINV"
            SmirFuncDist = "LOGNORMDIST"
            Mean = "LnRerata"
            StandardDev = "LnSimpanganBaku"
            Rata = "Rerata"
            Baku = "SimpanganBaku"
            BlankString = ""
            FillString = ""
            JumlahParameter = "2"
        Case 3
            NamaDist = "GUMBEL"
            ChiFuncDist = "GUMBELINV"
            SmirFuncDist = "GUMBELDIST"
            Mean = "Rerata"
            StandardDev = "SimpanganBaku"
            Rata = "Rerata"
            Baku = "SimpanganBaku"
            BlankString = ""
            FillString = ""
            JumlahParameter = "2"
        Case 4
            NamaDist = "LOG-PEARSON III"
            ChiFuncDist = "LOGPEARSONINV"
            SmirFuncDist = "LOGPEARSONDIST"
            Mean = "LnRerata"
            StandardDev = "LnSimpanganBaku"
            Rata = "LnRerata"
            Baku = "LnSimpanganBaku"
            BlankString = ",LnCS"
            FillString = ",LnCS"
            JumlahParameter = "3"
    End Select
End Sub



'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                                                                         %
'   %                                   UJI CHI - SQUARE                                      %
'   %                                                                                         %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    
    
    
Sub UJICHISQUARE()
Dim I As Integer, J As Integer, JenisDistribusi As Integer, NamaChi As Integer, _
    ChiKuadrat As Single, ChiKuadratMin As Single, ChiKuadratMinimum As Single, ChiKritik As Single, DK As Single

'   Uji Chi-Square pada program ini digunakan untuk pengujian 4 aplikasi distribusi antara lain :
'   1.  Distribusi Normal
'   2.  Distribusi Log-Normal
'   3.  Distribusi Gumbel
'   4.  Distribusi Log-Pearson Tipe III
    
'   Berikan judul diatas penabelan, format font dan beri warna
    Call JudulpadaInputData(JumlahKelas, JudulData, JudulKolomPertama, JudulKolomKedua)
   'Sheets("Uji Chi-Square").Activate
    Set c = Sheets("Uji Chi-Square").Range("B6")
    With c.Offset(-5, -1)
        .Value = "UJI CHI - SQUARE " & JudulData & ""
        With .Font
            .Name = Huruf2
            .Size = 12
            .Bold = True
        End With
        .HorizontalAlignment = xlLeft
    End With
    c.Offset(0, -1).Value = "" & JumlahKelas & ""
    ChiKuadratMin = 9999#
    
    For J = 1 To JumlahDistribusi
        
        Call RumusDistribusi(J, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
        
        I = (J - 1) * (JumlahKelas + 13)
        Set c = Sheets("Uji Chi-Square").Range("B6")
        With c
            With .Offset(I - 3, -1)
                .Value = "" & J & ". Aplikasi " & NamaDist & ""
                With .Font
                    .Name = Huruf2
                    .Size = 10
                    .Bold = True
                End With
                .HorizontalAlignment = xlLeft
            End With
            .Offset(I - 2, -1).Value = "Kelas"
            Range(.Offset(I - 2, 0), .Offset(I - 2, 1)).Merge
            Call JudulPeluangTeoritik(JudulPeluangTeoritis, JudulPeluangLapangan, JudulUrutanNomer)
            .Offset(I - 2, 0).Value = JudulPeluangTeoritis
            .Offset(I - 2, 2).Value = "Ef"
            .Offset(I - 2, 4).Value = "Of"
            .Offset(I - 2, 5).Value = "Ef - Of"
            .Offset(I - 2, 6).Value = "( Ef-Of )2 / Ef"
            .Offset(I - 2, 3).Value = JudulKolomKedua
            .Offset(I, -1).Value = JumlahKelas
            JumlahKelas = .Offset(I, -1).Value
        End With
        Kelasi = 0
            
'       Hitung peluang menurut jumlah kelasnya
        For Each c In Range(c, c.Offset(JumlahKelas - 1))
            Kelasi = Kelasi + 1
            c.Offset(I, 0).Value = Format(Kelasi / JumlahKelas, "##.000")
                If (Kelasi = JumlahKelas) Then
                    c.Offset(I, 0).Value = 0.999
                End If
        Next c
                     
        Set c = Sheets("Uji Chi-Square").Range("B6")
'       Berikan range peluang
        With c
            .Offset(I, 1).Formula = "= " & .Offset(-1, 0).Address(rowabsolute:=False, columnabsolute _
                                    :=False) & " &"" < P <= ""& " & .Offset(0, 0).Address(rowabsolute _
                                    :=False, columnabsolute:=False) & ""
                                        
'           Hitung nilai Ef (frekuensi sesuai pembagian kelasnya)
            .Offset(I, 2).Formula = "=(BanyakData / " & .Offset(0, -1).Address(rowabsolute:=True, _
                                    columnabsolute:=False) & ")"
   
'           Hitung debit air (X) untuk masing-masing 4 aplikasi distribusi
            If UCase(Range("CaraUrutData")) = "B" Then
'               Data diurutkan dari besar ke kecil
                .Offset(I, 3).Formula = "=" & ChiFuncDist & "(1-" & .Offset(I, 0).Address(rowabsolute:=False, _
                                columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & BlankString & ")"
                    
'               Jumlahkan data yang lebih besar dari debit teoritis  (Of)
                .Offset(I, 4).Formula = "=COUNTIF(MyString,"">=""& " & .Offset(I, 3).Address(rowabsolute _
                                :=False, columnabsolute:=False) & ") - COUNTIF(MyString,"">""&" _
                                & .Offset(I - 1, 3).Address(rowabsolute:=False, columnabsolute:=False) & ")"
    
            ElseIf UCase(Range("CaraUrutData")) = "K" Then
'               Data diurutkan dari kecil ke besar
                .Offset(I, 3).Formula = "=" & ChiFuncDist & "(" & .Offset(I, 0).Address(rowabsolute:=False, _
                                columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & BlankString & ")"
                    
'           Jumlahkan data yang lebih kecil dari debit teoritis  (Of)
                .Offset(I, 4).Formula = "=COUNTIF(MyString,""<=""& " & .Offset(I, 3).Address(rowabsolute _
                                :=False, columnabsolute:=False) & ") - COUNTIF(MyString,""<""&" _
                                & .Offset(I - 1, 3).Address(rowabsolute:=False, columnabsolute:=False) & " )"
            End If
          
'           Hitung nilai (Ef - Of)
            .Offset(I, 5).Formula = "=ABS(" & .Offset(I, 2).Address(rowabsolute:=False, columnabsolute _
                                :=False) & " - " & .Offset(I, 4).Address(rowabsolute:=False, _
                                columnabsolute:=False) & ")"
                
'           Hitung nilai (Ef - Of)^2/Ef
            .Offset(I, 6).Formula = "=" & .Offset(I, 5).Address(rowabsolute:=False, columnabsolute _
                                :=False) & "^2/" & .Offset(I, 2).Address(rowabsolute:=False, _
                                columnabsolute:=False) & ""
            
'           Kopikan hasil perhitungan (Fill Down) sebanyak Jumlah Kelas yang diinginkan
            Range(.Offset(I, 1), .Offset(I, 6)).AutoFill Destination:=Range(.Offset(I, 1), _
                                .Offset(I + JumlahKelas - 1, 6)), Type:=xlFillDefault
            
            If (.Offset(I - 1, 0).Value = "") Then
                .Offset(I, 1).Formula = "= 0 & "" < P <= "" & " & .Offset(I, 0).Address(rowabsolute _
                                :=False, columnabsolute:=False) & ""
            End If
           
'           Jumlahkan masing-masing nilai Ef
            .Offset(I + JumlahKelas, 2).Formula = "=SUM(" & .Offset(I, 2).Address(rowabsolute:=False, _
                    columnabsolute:=False) & " : " & .Offset(I, 2).End(xlDown).Address(rowabsolute _
                    :=False, columnabsolute:=False) & ")"
                                        
'           Jumlahkan masing-masing nilai Of
            .Offset(I + JumlahKelas, 4).Formula = "=SUM(" & .Offset(I, 4).Address(rowabsolute:=False, _
                    columnabsolute:=False) & " : " & .Offset(I, 4).End(xlDown).Address(rowabsolute _
                    :=False, columnabsolute:=False) & ")"
                                        
'           Hitung nilai Chi-Kuadrat
            .Offset(I + JumlahKelas, 6).Formula = "=SUM(" & .Offset(I, 6).Address(rowabsolute:=False, _
                    columnabsolute:=False) & " : " & .Offset(I, 6).End(xlDown).Address(rowabsolute _
                    :=False, columnabsolute:=False) & ")"
            ChiKuadrat = .Offset(I + JumlahKelas, 6).Value
                
'           Hitung Derajat Kebebasan
            With .Offset(I + JumlahKelas + 1, 6)
                    .Formula = "= JumlahKelas - " & JumlahParameter & " -1"
                  '  .Name = "DK"
            End With
            DK = .Offset(I + JumlahKelas + 1, 6).Value
            CError = 0
'           Berikan pesan apabila nilai DK <=0
            If (DK <= 0) Then
                CError = CError - 1
                    Msg = "Pengujian Distribusi " & NamaDist & " DITOLAK " & _
                        " karena DK <= 0.Ulangi perhitungan dan tambah jumlah kelas"
                    If (MsgBox(Msg, vbOKCancel + vbCritical, "Proyek Tugas Akhir," & _
                        "'Analisis Data Hidrologi'") = vbOK) Then
                        Sheets("Input Data").Activate
                        Range("JumlahKelas").Select
                    Exit Sub
                    End If
            End If
            
'           Hitung nilai Chi-Kritik
            With .Offset(I + JumlahKelas + 2, 6)
                    .Formula = "=CHIINV(CI," & c.Offset(I + JumlahKelas + 1, 6).Address(rowabsolute:=False, _
                        columnabsolute:=False) & ")"
            End With
            ChiKritik = c.Offset(I + JumlahKelas + 2, 6).Value
            
'           Format tabel dengan jenis font, ukuran dan rata kanan
            With Range(.Offset(I, -1), .Offset(I + JumlahKelas + 5, 6))
                With .Font
                    .Name = Huruf1
                    .Size = 10
                    .Bold = False
                End With
                .NumberFormat = "#,##0.000__"
                .HorizontalAlignment = xlRight
            End With
                
'           Untuk nilai dari kolom probabilitas letakkan di tengah
            Range(.Offset(I, 1), .Offset(I + JumlahKelas - 1, 1)).HorizontalAlignment = xlCenter
                
'           Berikan warna dasar hijau muda pada  tabel
            Range(.Offset(I - 1, -1), .Offset(I + JumlahKelas + 7, 6)).Interior.ColorIndex = 35
                    
'           Berikan warna dasar abu-abu pada  judul tabel
            Range(.Offset(I - 2, 2), .Offset(I - 2, 6)).Interior.ColorIndex = 15
            
'           Berikan warna biru muda pada  judul tabel
            Range(.Offset(I - 2, -1), .Offset(I - 2, 1)).Interior.ColorIndex = 40
            Range(.Offset(I - 2, -1), .Offset(I + JumlahKelas + 7, -1)).Interior.ColorIndex = 40
            
'           Berikan garis bawah pada judul tabel, format font
            With Range(.Offset(I - 2, -1), .Offset(I - 2, 6))
                With .Borders(xlEdgeBottom)
                    .LineStyle = xlContinuous
                    .Weight = xlThick
                End With
                With .Font
                    .Name = Huruf1
                    .Bold = True
                    .Size = 11
                End With
                .HorizontalAlignment = xlCenter
            End With
            .Offset(I + JumlahKelas + 1, 6).NumberFormat = "#,##0__"
            .Offset(I, -1).NumberFormat = "#,##0____"
            
'           Berikan kesimpulan pada akhir perhitungan, apakah pengujian masing-masing distribusi
'           dapat diterima atau tidak dengan Uji Chi-Square
            With .Offset(I + JumlahKelas + 2, -1)
                .HorizontalAlignment = xlLeft
                .Font.FontStyle = "Bold"
                .Formula = "=IF( " & c.Offset(I + JumlahKelas, 6).Address(rowabsolute:=False, _
                        columnabsolute:=False) & "  <  " & c.Offset(I + JumlahKelas + 2, 6).Address(rowabsolute:=False, _
                        columnabsolute:=False) & ",""Distribusi " & NamaDist & " Diterima""," & _
                        """Distribusi " & NamaDist & " Ditolak"")"
            End With
            
            If (ChiKuadratMin > ChiKuadrat) And (ChiKuadrat < ChiKritik) Then
                ChiKuadratMin = ChiKuadrat
                .Offset(I + JumlahKelas, 6).Name = "ChiKuadratMinimum"
                .Offset(I + JumlahKelas + 2, 6).Name = "ChiKritik"
                NamaChi = J
            End If
                
'           Berikan bentuk font yang tebal pada nilai chi-kuadrat
            Range(.Offset(I + JumlahKelas, 5), .Offset(I + JumlahKelas + 2, 5)).Font.Bold = True
                
'           Format bentuk font pada keterangan perhitungan
'           Berikan keterangan pelengkap pada tabel Chi-Square
            .Offset(I + JumlahKelas, 5).Value = "Chi-Kuadrat  ="
            .Offset(I + JumlahKelas + 1, 5).Value = "DK  ="
            .Offset(I + JumlahKelas + 2, 5).Value = "Chi-Kritik  ="
            .Offset(I + JumlahKelas + 3, -1).Value = "Ket. :"
            .Offset(I + JumlahKelas + 3, 0).Value = "Chi-Kuadrat  ="
            .Offset(I + JumlahKelas + 4, 0).Value = "Ef  ="
            .Offset(I + JumlahKelas + 5, 0).Value = "Of  ="
            .Offset(I + JumlahKelas + 6, 0).Value = "DK  ="
            .Offset(I + JumlahKelas + 3, 1).Value = "Harga Chi-Kuadrat"
            .Offset(I + JumlahKelas + 4, 1).Value = "Frekuensi sesuai pembagian kelasnya "
            .Offset(I + JumlahKelas + 5, 1).Value = "Frekuensi dengan aplikasi distribusi frekuensi "
            .Offset(I + JumlahKelas + 6, 1).Value = "Derajat Kebebasan "
            Range(.Offset(I + JumlahKelas + 3, -1), .Offset(I + JumlahKelas + 6, 0)).HorizontalAlignment = xlRight
            Range(.Offset(I + JumlahKelas + 3, 1), .Offset(I + JumlahKelas + 6, 1)).HorizontalAlignment = xlLeft
                
            With Range(.Offset(I + JumlahKelas + 3, -1), .Offset(I + JumlahKelas + 6, 1)).Font
                .Name = Huruf1
                .Size = 10
                .Bold = False
            End With
            .Offset(I - 2, 3).Characters(Start:=11, Length:=1).Font.Superscript = True
            .Offset(I - 2, 6).Characters(Start:=10, Length:=1).Font.Superscript = True
        End With
    Next J
    
    Call RumusDistribusi(NamaChi, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
        I = 3 * (JumlahKelas + 13)
     With Sheets("Uji Chi-Square").Range("B6")
        .Offset(I + JumlahKelas + 10, 0).Value = "Kesimpulan :"
        .Offset(I + JumlahKelas + 10, 1).Value = "1. Menurut Uji Chi-Kuadrat, Distribusi " & _
                " yang terbaik adalah " & NamaDist & ""
        .Offset(I + JumlahKelas + 11, 1).Value = "=""2. Dengan nilai Chi-Kritik =" & _
                "  "" & Text(" & "ChiKritik" & ", ""##.000"")"
        Sheets("Kala Ulang").Range("A7").Offset(JumlahKasus + 3, 1).Value = "2. Menurut Uji Chi-Kuadrat," & _
                " yang terbaik menggunakan distribusi " & NamaDist & ""
        .Offset(I + JumlahKelas + 12, 1).Value = "=""3. Dan nilai Chi-Kuadrat adalah  "" & Text" & _
                "(" & "ChiKuadratMinimum" & ", ""0.000"")"
        With Range(.Offset(I + JumlahKelas + 10, 0), .Offset(I + JumlahKelas + 12, 1)).Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
        End With
    End With
End Sub





'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                                                                         %
'   %                                UJI SMIRNOV-KOLMOGOROV                                   %
'   %                                                                                         %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    
    
    
Sub UJISMIRNOVKOLMOGOROV()
Dim I As Integer, JenisDistribusi As Integer, Nama As Integer, Text As String, _
    DKRITIK As Double, DeltaMaksMinimum As Double, DeltaMaksMin As Double
    
'   Uji Smirnov-Kolmogorov pada program ini digunakan untuk pengujian 4 aplikasi distribusi antara lain :
'   1.  Distribusi Normal
'   2.  Distribusi Log-Normal
'   3.  Distribusi Gumbel
'   4.  Distribusi Log-Pearson Tipe III

'   Kopikan data urut dari sheet Statistik Data
    Call JudulpadaInputData(JumlahKelas, JudulData, JudulKolomPertama, JudulKolomKedua)
    Range("MyString").Copy (Sheets("Uji Smirnov-Kolmogorov").Range("A5"))
    Sheets("Uji Smirnov-Kolmogorov").Activate
    
'   Berikan judul diatas penabelan
    With Range("A5")
        With .Offset(-4, 0)
            .Value = "UJI SMIRNOV-KOLMOGOROV " & JudulData & ""
            With .Font
                .Name = Huruf2
                .Size = 12
                .Bold = True
            End With
            .HorizontalAlignment = xlLeft
        End With

        .Offset(-2, 0).Value = "" & JudulKolomKedua & ""
        Call JudulPeluangTeoritik(JudulPeluangTeoritis, JudulPeluangLapangan, JudulUrutanNomer)
        .Offset(-2, 1).Value = "" & JudulUrutanNomer & ""
        .Offset(-2, 2).Value = "" & JudulPeluangLapangan & ""
        BanyakData = Range(.Offset(0, 0), .Offset(0, 0).End(xlDown)).Count
    
'       Tulis nomer urut (rangking data debit)
        .Offset(0, 1).Value = "1"

'       Tulis konstanta m/(N+1)
        .Offset(0, 2).Formula = "=(" & .Offset(0, 1).Address(rowabsolute:=False, columnabsolute:= _
                                    False) & "/ (BanyakData + 1))"
            
'       Proses perhitungan pengujian Smirnov-Kolmogorov
'       Hitung probabilitas dengan menggunakan rumus probabilitas masing-masing distribusi
        For I = 1 To JumlahDistribusi
            Call RumusDistribusi(I, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
'           Data diurutkan dari besar ke kecil
            If UCase(Range("CaraUrutData")) = "B" Then
                    .Offset(0, I + I + 1).Formula = "=1-" & SmirFuncDist & "(" & .Offset(I - I, 0).Address(rowabsolute:=False, _
                    columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & FillString & ")"
                    
'           Data diurutkan dari kecil ke besar
            ElseIf UCase(Range("CaraUrutData")) = "K" Then
                    .Offset(0, I + I + 1).Formula = "=" & SmirFuncDist & "(" & .Offset(I - I, 0).Address(rowabsolute:=False, _
                    columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & FillString & ")"
            End If
        
'           Berikan judul distribusi
            Range(.Offset(-2, I + I + 1), .Offset(-2, I + I + 2)).Merge
            .Offset(-2, I + I + 1).Value = "" & NamaDist & ""
            .Offset(-1, I + I + 1).Value = "" & JudulPeluangTeoritis & ""
            .Offset(-1, I + I + 2).Value = "Do"
            
'           Hitung nilai absolut dari PeluangTeoritis dikurang PeluangLapangan (Delta)
            .Offset(0, I + I + 2).Formula = "=ABS(" & .Offset(0, I + I + 1).Address(rowabsolute:=False, _
                            columnabsolute:=False) & " - " & .Offset(0, 2).Address(rowabsolute _
                            :=False, columnabsolute:=False) & ")"
        Next I

'       Kopikan hasil perhitungan (Fill Down) sebanyak Jumlah Kelas yang diinginkan
        Range(.Offset(0, 1), .Offset(0, 10)).AutoFill Destination:=Range(.Offset(0, 1), _
                            .Offset(BanyakData - 1, 10))
        
        DeltaMaksMinimum = 9999#
        For I = 1 To JumlahDistribusi
'           Hitung nilai Delta maksimum dari seluruh data
            Set c = Range("A5")
            With .Offset(BanyakData + 1, I + I + 2)
                .Formula = "=MAX(" & c.Offset(0, I + I + 2).Address(rowabsolute:=False, _
                        columnabsolute:=False) & " : " & c.Offset(0, I + I + 2).End(xlDown) _
                        .Address(rowabsolute:=False, columnabsolute:=False) & ")"
            End With
            
'           Hitung Delta kritik
            With .Offset(BanyakData + 1, 1)
                .Formula = "=DELTAKRITIK(BanyakData,CI)"
                .Name = "DKRITIK"
            End With
            DKRITIK = .Offset(BanyakData + 1, 1).Value
            
'           Berikan pesan pada akhir perhitungan, apakah pengujian masing-masing distribusi
'           dengan Uji Smirnov Kolmogorov bisa diterima atau tidak
            With .Offset(BanyakData + 2, I + I + 2)
                .Formula = "=IF( " & c.Offset(BanyakData + 1, I + I + 2).Address(rowabsolute:=False, _
                        columnabsolute:=False) & "  <  DKRITIK,""Diterima"",""Ditolak"")"
                .HorizontalAlignment = xlCenter
            End With
            
            If (DeltaMaksMinimum > .Offset(BanyakData + 1, I + I + 2)) And (.Offset(BanyakData + 2, I + I + 2). _
                Value = "Diterima") Then
                DeltaMaksMinimum = .Offset(BanyakData + 1, I + I + 2)
                .Offset(BanyakData + 1, I + I + 2).Name = "DeltaMaksMin"
                Nama = I
            End If
        Next I
        
'       Format bentuk font dan berikan warna pada tabel pengujian Smirnov Kolmogorov
        With Range(.Offset(0, 2), .Offset(0, 10).End(xlDown))
            .Font.Name = Huruf1
            .HorizontalAlignment = xlRight
            .NumberFormat = "#,##0.000____"
        End With
        With Range(.Offset(0, 1), .Offset(0, 1).End(xlDown))
            .Font.Name = Huruf1
            .HorizontalAlignment = xlRight
            .NumberFormat = "#,##0____"
        End With
        With Range(.Offset(-1, 0), .Offset(-2, 10))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
            .Interior.ColorIndex = 40
            .HorizontalAlignment = xlCenter
        End With
        Range(.Offset(0, 0), .Offset(BanyakData + 6, 10)).Interior.ColorIndex = 35
        With Range(.Offset(BanyakData + 1, 0), .Offset(BanyakData + 7, 10))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
            .NumberFormat = "#,##0.000____"
        End With

'   Berikan keterangan penjelasan pada Uji Smirnov-Kolmogorov
        .Offset(BanyakData + 1, 0).Value = "DKritik  ="
        .Offset(BanyakData + 3, 0).Value = "Ket.  :"
        .Offset(BanyakData + 3, 1).Value = "m  ="
        .Offset(BanyakData + 4, 1).Value = "P   ="
        .Offset(BanyakData + 5, 1).Value = "Do ="
        .Offset(BanyakData + 3, 2).Value = "Peringkat"
        .Offset(BanyakData + 4, 2).Value = "Peluang di lapangan"
        .Offset(BanyakData + 5, 2).Value = "Selisih peluang lapangan dengan peluang teoritis"

'       Format keterangan tabel
        With Range(.Offset(BanyakData + 3, 0), .Offset(BanyakData + 5, 2))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = False
            End With
            .HorizontalAlignment = xlRight
        End With
        Range(.Offset(BanyakData + 3, 2), .Offset(BanyakData + 5, 2)).HorizontalAlignment = xlLeft
        Range(.Offset(BanyakData + 1, 0), .Offset(BanyakData + 3, 0)).HorizontalAlignment = xlRight
        .Offset(-2, 0).Characters(Start:=11, Length:=1).Font.Superscript = True
    
'       Berikan kesimpulan akhir
        Call RumusDistribusi(Nama, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
        .Offset(BanyakData + 9, 0).Value = "Kesimpulan :"
        .Offset(BanyakData + 9, 1).Value = "=""1. Uji Smirnov-Kolmogorov menggunakan nilai Delta Kritik" & _
                "  "" & Text(" & "DKRITIK" & ", ""0.000"")"
        .Offset(BanyakData + 10, 1).Value = "2. Menurut Uji Smirnov-Kolmogorov, Distribusi " & _
                " yang terbaik adalah " & NamaDist & ""
        .Offset(BanyakData + 11, 1).Value = "=""3. Dengan nilai Delta Maksimum adalah  "" & Text" & _
                "(" & "DeltaMaksMin" & ", ""0.000"")"
        With Range(.Offset(BanyakData + 9, 0), .Offset(BanyakData + 12, 1))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
            .HorizontalAlignment = xlLeft
        End With
        With Sheets("Kala Ulang").Range("A7")
            .Offset(JumlahKasus + 4, 1).Value = "3. Sedangkan menurut " & _
                " Uji Smirnov-Kolmogorov, yang terbaik menggunakan distribusi " & NamaDist & ""
            .Offset(JumlahKasus + 5, 1).Value = "4. Hitungan dilakukan dengan menggunakan rumus" & _
                " dalam buku 'Applied Hidrology', 1988, Ven Te Chow, et. al."
        End With
    End With
End Sub



'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
'   %                                                                                         %
'   %                                      PERHITUNGAN                                        %
'   %                                                                                         %
'   %                                       KALA ULANG                                        %
'   %                                                                                         %
'   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


Sub KALAULANG()
Dim I As Integer
Dim FaktorFrekuensi As String, JudulDebit As String, Rata As String, Baku As String
Dim ChiKuadrat As Single, ChiKritik As Single, DMaks As Single, DKRITIK As Single
        
'   Kopi data probability dari lembar kerja Input Data
    Call JudulpadaInputData(JumlahKelas, JudulData, JudulKolomPertama, JudulKolomKedua)
    Range("Probability").Copy (Sheets("Kala Ulang").Range("A7"))
    
'   Aktifkan Sheet
    Sheets("Kala Ulang").Activate
    Set c = Range("A7")
    JumlahKasus = Range(c, c.End(xlDown)).Count
    
'       Berikan judul tabel
    With Range("A7")
        .Offset(-6, 0).Value = "KALA-ULANG " & JudulData & ""
        With .Offset(-6, 0)
            With .Font
                .Name = Huruf2
                .Size = 12
                .Bold = True
            End With
            .HorizontalAlignment = xlLeft
        End With
        Call JudulPeluangTeoritik(JudulPeluangTeoritis, JudulPeluangLapangan, JudulUrutanNomer)
        .Offset(-3, 0).Value = JudulPeluangTeoritis
        .Offset(-3, 1).Value = "T"
        Range(.Offset(-3, 2), .Offset(-3, 9)).Merge
        .Offset(-3, 2).Value = "Karakteristik Debit (m3/dt) Menurut Probabilitasnya"
        .Offset(-2, 0).Value = "Probabilitas"
        .Offset(-2, 1).Value = "Kala-Ulang"
        JudulDebit = "XT"
        FaktorFrekuensi = "KT"
        
'       Hitung peluang yang terjadi apabila data diurutkan dari besar ke kecil atau sebaliknya
        .Offset(0, 1).Formula = "= 1/" & c.Address(rowabsolute:=False, columnabsolute:=False) & ""
        
        For I = 1 To JumlahDistribusi
            Call RumusDistribusi(I, NamaDist, SmirFuncDist, ChiFuncDist, Mean, StandardDev, _
                    BlankString, FillString, JumlahKelas, Rata, Baku, JumlahParameter)
            Range(.Offset(-2, I + I), .Offset(-2, I + I + 1)).Merge
            .Offset(-2, I + I).Value = "" & NamaDist & ""
            .Offset(-1, I + I).Value = "" & JudulDebit & ""
            .Offset(-1, I + I + 1).Value = "" & FaktorFrekuensi & ""
            If UCase(Range("CaraUrutData")) = "B" Then
                .Offset(0, I + I).Formula = "=" & ChiFuncDist & "( 1-" & c.Address _
                    (rowabsolute:=False, columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & _
                    BlankString & ")"
            ElseIf UCase(Range("CaraUrutData")) = "K" Then
                .Offset(0, I + I).Formula = "=" & ChiFuncDist & "(" & c.Address _
                    (rowabsolute:=False, columnabsolute:=False) & "," & Mean & "," & StandardDev & "" & _
                    BlankString & ")"
            End If
            If (I = JumlahDistribusi) Then
                .Offset(0, I + I + 1).Formula = "=(ln(" & c.Offset(0, I + I).Address _
                    (rowabsolute:=False, columnabsolute:=False) & ")-" & Rata & ")/" & Baku & ""
            ElseIf (I <> JumlahDistribusi) Then
                .Offset(0, I + I + 1).Formula = "=(" & c.Offset(0, I + I).Address _
                    (rowabsolute:=False, columnabsolute:=False) & "-" & Rata & ")/" & Baku & ""
            End If
        Next I
        Range(.Offset(0, 1), .Offset(0, 9)).AutoFill Destination:=Range(.Offset(0, 1), .Offset(JumlahKasus - 1, 9))
        
'       Format warna dan font pada judul
        With Range(.Offset(-3, 0), .Offset(-2, 9))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
            .HorizontalAlignment = xlCenter
        End With
        With .Offset(-3, 2)
            With .Font
                .Name = Huruf2
                .Size = 10
            End With
            .Characters(Start:=23, Length:=1).Font.Superscript = True
        End With
        With Range(.Offset(-1, 0), .Offset(-1, 9))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
            .HorizontalAlignment = xlCenter
        End With
        Range(.Offset(-3, 0), .Offset(-1, 9)).Interior.ColorIndex = 42
        With Range(.Offset(0, 0), .Offset(JumlahKasus, 9))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = False
            End With
            .HorizontalAlignment = xlRight
            .NumberFormat = "#,##0.000____"
            .Interior.ColorIndex = 34
        End With
        Range(.Offset(0, 0), .Offset(JumlahKasus - 1, 0)).NumberFormat = "0.###____"
        Range(.Offset(0, 1), .Offset(JumlahKasus - 1, 1)).NumberFormat = "#,##0.#____"
        
        With Range(.Offset(JumlahKasus + 2, 0), .Offset(JumlahKasus + 5, 1))
            With .Font
                .Name = Huruf1
                .Size = 10
                .Bold = True
            End With
        End With
        With .Offset(JumlahKasus + 2, 0)
            .Value = "Ket  :"
            .HorizontalAlignment = xlRight
        End With
        Range(.Offset(JumlahKasus + 2, 1), .Offset(JumlahKasus + 2, 2)).Merge
        With .Offset(JumlahKasus + 2, 1)
            .Value = "1. XT = m + KT * s"
            .Characters(Start:=1, Length:=4).Font.Name = "Arial"
            .Characters(Start:=5, Length:=1).Font.Subscript = True
            .Characters(Start:=9, Length:=1).Font.Name = "Symbol"
            .Characters(Start:=14, Length:=4).Font.Subscript = True
            .Characters(Start:=18, Length:=1).Font.Name = "Symbol"
        End With
        Range(.Offset(JumlahKasus + 2, 1), .Offset(JumlahKasus + 4, 1)).HorizontalAlignment = xlLeft
        With Range(.Offset(-1, 2), .Offset(-1, 9))
            .Characters(Start:=2, Length:=1).Font.Subscript = True
        End With
    End With
End Sub

    

Sub BersihkanSheet()
    Sheets("Kala Ulang").Cells.Clear
    Sheets("Uji Smirnov-Kolmogorov").Cells.Clear
    Sheets("Uji Chi-Square").Cells.Clear
    Sheets("Statistik Dasar").Cells.Clear
End Sub


Sub PERHITUNGANTOTAL()
    BersihkanSheet
    InputData
    If NError < 0 Then Exit Sub
    StatistikDasar
    UJICHISQUARE
    If CError < 0 Then Exit Sub
    UJISMIRNOVKOLMOGOROV
    KALAULANG
End Sub


Function GUMBELDIST(X As Single, Rerata As Single, SimpanganBaku As Single) As Single
Dim Alpha As Single, U As Single, Y As Single
    Alpha = 2.4495 * SimpanganBaku / Application.Pi()
    U = Rerata - (0.5772 * Alpha)
    Y = (X - U) / Alpha
    GUMBELDIST = Exp(-Exp(-Y))
End Function


Function GUMBELINV(Probabilitas As Single, Rerata As Single, SimpanganBaku As Single) As Single
Dim Alpha As Single, U As Single, Y As Single, Pi As Single
    Alpha = 2.4495 * SimpanganBaku / Application.Pi()
    U = Rerata - (0.5772 * Alpha)
    Y = -Application.Ln(-Application.Ln(Probabilitas))
    GUMBELINV = U + Y * Alpha
End Function

Function LOGPEARSONINV(Probabilitas As Single, Rerata As Single, _
         SimpanganBaku As Single, Coef_Skewness As Single) As Single
Dim z As Single, K As Single, KT As Single

'   fungsi LOGPEARSONINV digunakan untuk menghitung nilai Y dengan menggunakan Distribusi log-Pearson Tipe III
'   apabila diketahui : P(y <= Y), rerata, simpangan baku

'I. Hitung nilai Z dengan Dist. Normal Standar N(0,1)
    z = Application.NormSInv(Probabilitas)

'II.a. Hitung nilai K (lihat Pers. 3.10)
    K = Coef_Skewness / 6
    
'   b. Hitung nilai KT (lihat Pers. 3.9)
    KT = z + (z ^ 2 - 1) * K + (z ^ 3 - 6 * z) * K ^ 2 / 3 - (z ^ 2 - 1) * K ^ 3 + z * K ^ 4 + K ^ 5 / 3

'III. Hitung nilai Y (lihat Pers. 3.11)
    LOGPEARSONINV = Exp(Rerata + KT * SimpanganBaku)
    
End Function

Function LOGPEARSONDIST(Y As Single, Rerata As Single, SimpanganBaku As Single, Coef_Skewness As Single) As Single
Dim z As Single, W As Single, FZ As Single, FZi As Single, FW As Single, fwi As Single, deltaZ As Single, _
    deltaW As Single, K As Single, KT As Single, P As Single

'   fungsi LOGPEARSONDIST digunakan untuk menghitung probabilitas dari nilai Y dengan menggunakan Distribusi
'   log-Pearson Tipe III apabila diketahui : nilai Y, rerata, simpangan baku

'I. Hitung nilai KT (lihat Pers. 2.38)
    KT = (Application.Ln(Y) - Rerata) / SimpanganBaku
    
'II.a. Hitung nilai K (lihat Pers. 2.36)
    K = Coef_Skewness / 6

'II.b. Hitung Z dengan menggunakan metode Newton-Rhapson (lihat Pers. 2.39, 2.40, 2.41)
    z = 0.001  ' Nilai Z trial pertama
    Do
      FZ = z + (z ^ 2 - 1) * K + (z ^ 3 - 6 * z) * K ^ 2 / 3 - (z ^ 2 - 1) * K ^ 3 + z * K ^ 4 + K ^ 5 / 3 - KT
      FZi = 1 + 2 * K * z + K ^ 2 * z ^ 2 - 2 * K ^ 2 - 2 * K ^ 3 * z + K ^ 4
      deltaZ = FZ / FZi
      z = z - deltaZ
    Loop Until Abs(deltaZ) < 0.001
    
'III. Hitung probabilitas dengan Dist. Normal Standar N(0,1)
    LOGPEARSONDIST = Application.NormSDist(z)
    
End Function


Function DeltaKritik(N As Single, D As Single) As Single
Dim BarisAtas As Single, BarisBawah As Single, Deret(0 To 4) As Single, KolomKiri As Single, KolomKanan As Single
Dim I As Single, J As Single
Dim Urutan(0 To 26) As Single, X As Single, Y As Single
Dim c(0 To 26, 0 To 4) As Single, P(0 To 4) As Single

'   Tulis data deret
    Deret(1) = 0.2
    Deret(2) = 0.1
    Deret(3) = 0.05
    Deret(4) = 0.01
    
'   Tulis data urutan
    Urutan(1) = 1
    Urutan(2) = 2
    Urutan(3) = 3
    Urutan(4) = 4
    Urutan(5) = 5
    Urutan(6) = 6
    Urutan(7) = 7
    Urutan(8) = 8
    Urutan(9) = 9
    Urutan(10) = 10
    Urutan(11) = 11
    Urutan(12) = 12
    Urutan(13) = 13
    Urutan(14) = 14
    Urutan(15) = 15
    Urutan(16) = 16
    Urutan(17) = 17
    Urutan(18) = 18
    Urutan(19) = 19
    Urutan(20) = 20
    Urutan(21) = 25
    Urutan(22) = 30
    Urutan(23) = 35
    Urutan(24) = 40
    Urutan(25) = 45
    Urutan(26) = 50
    
'   Masukkan data uji Smirnov-Kolmogorov
    c(1, 1) = 0.9
    c(2, 1) = 0.68
    c(3, 1) = 0.56
    c(4, 1) = 0.49
    c(5, 1) = 0.45
    c(6, 1) = 0.41
    c(7, 1) = 0.38
    c(8, 1) = 0.36
    c(9, 1) = 0.34
    c(10, 1) = 0.32
    c(11, 1) = 0.31
    c(12, 1) = 0.3
    c(13, 1) = 0.28
    c(14, 1) = 0.27
    c(15, 1) = 0.27
    c(16, 1) = 0.26
    c(17, 1) = 0.25
    c(18, 1) = 0.24
    c(19, 1) = 0.24
    c(20, 1) = 0.23
    c(21, 1) = 0.21
    c(22, 1) = 0.19
    c(23, 1) = 0.18
    c(24, 1) = 0.17
    c(25, 1) = 0.16
    c(26, 1) = 0.15
    c(1, 2) = 0.95
    c(2, 2) = 0.78
    c(3, 2) = 0.64
    c(4, 2) = 0.56
    c(5, 2) = 0.51
    c(6, 2) = 0.47
    c(7, 2) = 0.44
    c(8, 2) = 0.41
    c(9, 2) = 0.39
    c(10, 2) = 0.37
    c(11, 2) = 0.35
    c(12, 2) = 0.34
    c(13, 2) = 0.32
    c(14, 2) = 0.31
    c(15, 2) = 0.3
    c(16, 2) = 0.3
    c(17, 2) = 0.29
    c(18, 2) = 0.28
    c(19, 2) = 0.27
    c(20, 2) = 0.26
    c(21, 2) = 0.24
    c(22, 2) = 0.22
    c(23, 2) = 0.21
    c(24, 2) = 0.19
    c(25, 2) = 0.18
    c(26, 2) = 0.17
    c(1, 3) = 0.98
    c(2, 3) = 0.84
    c(3, 3) = 0.71
    c(4, 3) = 0.62
    c(5, 3) = 0.56
    c(6, 3) = 0.52
    c(7, 3) = 0.49
    c(8, 3) = 0.46
    c(9, 3) = 0.43
    c(10, 3) = 0.41
    c(11, 3) = 0.39
    c(12, 3) = 0.38
    c(13, 3) = 0.36
    c(14, 3) = 0.35
    c(15, 3) = 0.34
    c(16, 3) = 0.33
    c(17, 3) = 0.32
    c(18, 3) = 0.31
    c(19, 3) = 0.3
    c(20, 3) = 0.29
    c(21, 3) = 0.26
    c(22, 3) = 0.24
    c(23, 3) = 0.23
    c(24, 3) = 0.21
    c(25, 3) = 0.2
    c(26, 3) = 0.19
    c(1, 4) = 0.99
    c(2, 4) = 0.93
    c(3, 4) = 0.83
    c(4, 4) = 0.73
    c(5, 4) = 0.67
    c(6, 4) = 0.62
    c(7, 4) = 0.58
    c(8, 4) = 0.54
    c(9, 4) = 0.51
    c(10, 4) = 0.49
    c(11, 4) = 0.47
    c(12, 4) = 0.45
    c(13, 4) = 0.43
    c(14, 4) = 0.42
    c(15, 4) = 0.4
    c(16, 4) = 0.39
    c(17, 4) = 0.38
    c(18, 4) = 0.37
    c(19, 4) = 0.36
    c(20, 4) = 0.35
    c(21, 4) = 0.32
    c(22, 4) = 0.29
    c(23, 4) = 0.27
    c(24, 4) = 0.25
    c(25, 4) = 0.24
    c(26, 4) = 0.23
    
'   Tentukan nilai batas untuk Kolom Kiri dan Kolom Kanan
    If (D > 0.2) Then
        D = 0.2
    ElseIf (D < 0.01) Then
        D = 0.01
    End If
    
    For I = 1 To 4
        If (D >= Deret(I)) Then
            KolomKiri = I - 1
            KolomKanan = I
            Exit For
        End If
    Next
    
'   Hitung Delta Kritik apabila jumlah data (N) diatas 50
    If (N > 50) Then
        P(1) = 1.07
        P(2) = 1.22
        P(3) = 1.36
        P(4) = 1.63
        DeltaKritik = P(KolomKiri) / N ^ 0.5 + (P(KolomKanan) / N ^ 0.5 - P(KolomKiri) / N ^ 0.5) _
                    * (D - Deret(KolomKiri)) / (Deret(KolomKanan) - Deret(KolomKiri))
        Exit Function
    End If

'   Tentukan nilai batas untuk Baris Atas dan Baris Bawah
    If (N <= 0) Then
        N = 1
    End If
    
    For J = 1 To 26
        If (N <= Urutan(J)) Then
            BarisBawah = J
            BarisAtas = J - 1
            Exit For
        End If
    Next
    
'   Hitung  nilai Delta-Kritik
    X = c(BarisAtas, KolomKiri) + (c(BarisBawah, KolomKiri) - c(BarisAtas, KolomKiri)) _
        * (N - Urutan(BarisAtas)) / (Urutan(BarisBawah) - Urutan(BarisAtas))
    
    Y = c(BarisAtas, KolomKanan) + (c(BarisBawah, KolomKanan) - c(BarisAtas, KolomKanan)) _
        * (N - Urutan(BarisAtas)) / (Urutan(BarisBawah) - Urutan(BarisAtas))
    
    DeltaKritik = Y + ((X - Y) * (D - Deret(KolomKanan)) / _
                (Deret(KolomKiri) - Deret(KolomKanan)))
    
End Function



