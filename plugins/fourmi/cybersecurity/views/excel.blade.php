<html>
  <head>
    <meta charset="utf-8">

    <style>
    .ind-title{
      border-top: 1px solid #fff;
      border-bottom:  1px solid #fff;
    }

    .heading1{
      font-weight: bold;
    }
    .heading2{
      font-weight: bold;
      color: #666;
    }

    .fgc-1{ color: #418b41;}
    .fgc-2{ color: #126da2;}
    .fgc-3{ color: #ed8824;}
    .fgc-4{ color: #d51d24;}
    .fgc-5{ color: #eac01d;}

    .bgc-1-5{ background-color: #248A36;}
    .bgc-1-4{ background-color: #4E923F;}
    .bgc-1-3{ background-color: #6AA257;}
    .bgc-1-2{ background-color: #85B576;}
    .bgc-1-1{ background-color: #9EC995;}

    .bgc-2-5{ background-color: #006EA6;}
    .bgc-2-4{ background-color: #277CB1;}
    .bgc-2-3{ background-color: #3B8DBC;}
    .bgc-2-2{ background-color: #5AA8CE;}
    .bgc-2-1{ background-color: #94C7D7;}

    .bgc-3-5{ background-color: #ED7819;}
    .bgc-3-4{ background-color: #EE8A29;}
    .bgc-3-3{ background-color: #EE933D;}
    .bgc-3-2{ background-color: #EEA763;}
    .bgc-3-1{ background-color: #EEBE93;}

    .bgc-4-5{ background-color: #D61E25;}
    .bgc-4-4{ background-color: #D8322F;}
    .bgc-4-3{ background-color: #DE5B4D;}
    .bgc-4-2{ background-color: #E78F80;}
    .bgc-4-1{ background-color: #EDB6AD;}

    .bgc-5-5{ background-color: #E4AE12;}
    .bgc-5-4{ background-color: #E9B93C;}
    .bgc-5-3{ background-color: #EEC662;}
    .bgc-5-2{ background-color: #F2D486;}
    .bgc-5-1{ background-color: #F7E2A9;}

    .ml{
      color: #fff;
      text-align: center;
    }
    td{
      border:1px solid #fff;
    }

    tr{
      border:1px solid #fff;
    }
    </style>

  </head>
  <body>
    <table>
      <tr>
        <td class="heading2">Observatorio de la CiberSeguridad en Latinoamerica y el Caribe</td>
        @foreach ($countries as $country)
          <td></td>
        @endforeach
        <td></td>
      </tr>
      <tr>
        <td></td>
        @foreach ($countries as $country)
          <td width="10" style="font-weight: bold;" align="center">{{ $country['name'] }}</td>
        @endforeach
        <td></td>
      </tr>
      @foreach ($dimensions as $dimension)
        <tr>
          <td width="60" align="right" class="heading1 fgc-{{ $dimension->id }}">{{ $dimension->title }}</td>
          @foreach ($countries as $country)
            <td></td>
          @endforeach
          <td></td>
        </tr>
        @foreach ($dimension->factors as $factor)
          <tr>
            <td style="font-weight: bold;" align="right">{{ $factor->title }}</td>
            @foreach ($countries as $country)
              <td></td>
            @endforeach
            <td></td>
          </tr>
          @foreach ($factor->indicators as $indicator)
            <tr>
              <td valign="middle" align="right" class="ind-title fgc-{{ $dimension->id }}">{{ $indicator->title }}</td>
              @foreach ($countries as $country)
                <td class="ml bgc-{{ $dimension->id }}-{{$country['maturity_levels'][$indicator->id]}}">{{$country['maturity_levels'][$indicator->id]}}</td>
              @endforeach
              <td></td>
            </tr>
          @endforeach
        @endforeach
      @endforeach
      <tr>
        <td></td>
        @foreach ($countries as $country)
          <td></td>
        @endforeach
        <td></td>
      </tr>

    </table>
  </body>
</html>
