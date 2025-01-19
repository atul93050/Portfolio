<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time-Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            color: #333;
        }


        header {
            background-color: #2980b9;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        
        }

        header h1 {
            font-size: 2.5rem;
        }


        footer {
            background-color: #2980b9;
            color: #fff;
            text-align: center;
            padding: 10px;

            width: 100%;

        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }

       
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #2980b9;
            color: #fff;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            background-color: #ecf0f1;
            font-size: 0.9rem;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #dfe6e9;
        }

      
        @media (max-width: 1200px) {

            th,
            td {
                padding: 10px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {

            th,
            td {
                font-size: 0.8rem;
                padding: 8px;
            }

            table {
                margin: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }

            th,
            td {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (max-width: 480px) {

            th,
            td {
                font-size: 0.7rem;
                padding: 6px;
            }

            h1 {
                font-size: 1.2rem;
            }

            table {
                margin: 5px;
            }

            th,
            td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            tr {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Time Table - 2024-25</h1>
    </header>

    <!-- Time Table -->
    <main>
        <table>
            <thead>
                <tr>
                    <th colspan="3">Session : 2024-25</th>
                    <th colspan="6">Hewett Polytechnic, Lucknow</th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th colspan="3">Semester : Odd</th>
                    <th colspan="6">Information Technology</th>
                    <th colspan="2">Wef : 12-08-2024</th>
                </tr>
                <tr>

                    <th colspan="11">Time Table</th>

                </tr>
                <tr>
                    <th>DAY</th>
                    <th>SEM</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th rowspan="2">01:20 pm 01:40 pm</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>10:00 am - 10:50 am</th>
                    <th>10:50 am - 11:40 am</th>
                    <th>11:40 am - 12:30 pm</th>
                    <th>12:30 pm - 01:20 pm</th>
                    <th>01:40 pm - 02:30 pm</th>
                    <th>02:30 pm - 03:20 pm</th>
                    <th>03:20 pm - 04:10 pm</th>
                    <th>04:10 pm - 05:00 pm</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">M</td>
                    <td>1st</td>
                    <td colspan="4">SCA (DY) (IT-1/IT-2)//CS-I Lab (GL) (IT-2/IT-1)

                    </td>
                    <td rowspan="18">BREAK</td>
                    <td colspan="2">
                        Chem. (GL)
                    </td>
                    <td>Phy-I (GL)
                    </td>
                    <td>FCIT (PV)
                    </td>

                </tr>
                <tr>


                    <td>3rd
                    </td>
                    <td colspan="2">DCCN (PV)
                    </td>
                    <td colspan="2">DSUC Lab (RK)
                    </td>
                    <td colspan="4">
                        IWT Lab (RK)
                    </td>

                </tr>
                <tr>

                    <td>5th
                    </td>
                    <td colspan="4">MPW (DNS)
                    </td>
                    <td>MPW (DNS)
                    </td>
                    <td>SE (DY)
                    </td>
                    <td colspan="2">
                        SCA (DNS)
                    </td>

                </tr>
                <tr>
                    <td rowspan="3">T</td>
                    <td>1st
                    </td>
                    <td colspan="4">Phy Lab (GL) (IT-1/IT-2)//Chem Lab (GL) (IT-2/IT-1)
                    </td>
                    <td colspan="2">Math-1 (GL)
                    </td>
                    <td colspan="2">CS-I (GL)
                    </td>

                </tr>
                <tr>

                    <td>
                        3rd
                    </td>
                    <td colspan="2">DSUC (DY)
                    </td>
                    <td colspan="2">Math-III (GL)
                    </td>
                    <td colspan="4">SCA (PV) (IT-1/IT-2)//ESDM Lab (GLC-2) (IT2/IT-1)
                    </td>

                </tr>
                <tr>

                    <td>5th
                    </td>
                    <td colspan="2">ISIL (PV)
                    </td>
                    <td colspan="2">PHP Lab (RK)
                    </td>
                    <td colspan="2">PHP Lab (RK)
                    </td>
                    <td colspan="2">
                        SE (DY)</td>

                </tr>
                <tr>
                    <td rowspan="3">W</td>
                    <td>1st
                    </td>
                    <td colspan="4">Workshop Practice
                    </td>
                    <td>FCIT (PV)
                    </td>
                    <td>Chem (GL)
                    </td>
                    <td colspan="2">
                        Phy-I (GL)
                    </td>

                </tr>
                <tr>

                    <td>3rd
                    </td>
                    <td colspan="2">
                        IWT (PV)
                    </td>
                    <td>
                        DSUC (DY)
                    </td>
                    <td>
                        ESDM (PV)
                    </td>
                    <td colspan="2">
                        CAHM (DY)
                    </td>
                    <td colspan="2">DCCN (PV)
                    </td>

                </tr>
                <tr>

                    <td>
                        5th

                    </td>
                    <td colspan="4">IOT Lab (RK)
                    </td>
                    <td colspan="2">
                        CPUP (DNS)
                    </td>
                    <td colspan="2">
                        PHP Lab (RK)
                    </td>

                </tr>
                <tr>
                    <td rowspan="3">Th</td>
                    <td>1st
                    </td>
                    <td colspan="4">Workshop Practice
                    </td>
                    <td>FCIT (PV)
                    </td>
                    <td>Math-I (GL)
                    </td>
                    <td colspan="2">TD (DNS)
                    </td>

                </tr>
                <tr>

                    <td>3rd
                    </td>
                    <td colspan="2">
                        DSUC Lab (RK)
                    </td>
                    <td colspan="2">DCCN (PV)
                    </td>
                    <td>
                        Math-III (GL)
                    </td>
                    <td>DSUC Lab (RK)
                    </td>
                    <td colspan="2">IWT (PV)
                    </td>

                </tr>
                <tr>

                    <td>
                        5th
                    </td>
                    <td colspan="2">
                        CPUP (DNS)
                    </td>
                    <td colspan="2">
                        ISIL Lab (RK)

                    </td>
                    <td colspan="2">IOT (DY)
                    </td>
                    <td colspan="2">ISIL Lab (RK)
                    </td>

                </tr>
                <tr>
                    <td rowspan="3">F</td>
                    <td>1st
                    </td>
                    <td colspan="2">Math-I (GL)
                    </td>
                    <td colspan="2">CS-I (GL)
                    </td>
                    <td colspan="2">Phy-1 (GL)
                    </td>
                    <td colspan="2">Chem. (GL)
                    </td>

                </tr>
                <tr>
                    <td>3rd
                    </td>
                    <td colspan="4">CAHM Lab (DY)
                    </td>
                    <td colspan="2">Math-III (GL)
                    </td>
                    <td colspan="2">CAHM (DY)
                    </td>

                </tr>
                <tr>
                    <td>
                        5th
                    </td>
                    <td colspan="2">SE Lab (RK)
                    </td>
                    <td colspan="2">PHP (DNS)
                    </td>
                    <td colspan="4">
                        CPUP Lab (RK)
                    </td>

                </tr>
                <tr>
                    <td rowspan="3">S</td>
                    <td>
                        1st
                    </td>
                    <td colspan="4">
                        TD (DNS)
                    </td>
                    <td colspan="4">FCIT Lab (RK)
                    </td>

                </tr>
                <tr>
                    <td>3rd
                    </td>
                    <td colspan="4">
                        DCCN Lab (RK)
                    </td>
                    <td colspan="2">DSUC (DY)
                    </td>
                    <td colspan="2">
                        ESDM (PV)
                    </td>

                </tr>
                <tr>
                    <td>
                        5th
                    </td>
                    <td>MPW (PV)
                    </td>
                    <td colspan="2">
                        IOT (DY)
                    </td>
                    <td>
                        ISIL (PV)
                    </td>
                    <td>
                        ISIL (PV)
                    </td>
                    <td colspan="2">PHP (DNS)
                    </td>
                    <td>SE (DY)
                    </td>

                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hewett Polytechnic, Lucknow. All Rights Reserved.</p>
    </footer>

</body>

</html>