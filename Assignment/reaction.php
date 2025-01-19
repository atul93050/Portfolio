<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Types of Chemical Reactions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px 10%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        header h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #ff9900;
            color: #fff;
        }

        .content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .content h2,
        .content h3,
        .content h4,
        .content h5 {
            color: #444;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .content h2 {
            font-size: 2.5rem;
            color: #333333;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 20px;
            border-bottom: 3px solid #ff9900;
            padding-bottom: 10px;
        }

        hr {
            border: none;
            border-bottom: 3px solid #ff9900;
            margin: 30px 0;

        }

        .content h3 {
            font-size: 2rem;
            color: #444;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 15px;
            border-left: 5px solid #ff9900;
            padding-left: 10px;
        }

        .content h4 {
            font-size: 1.75rem;
            color: #555;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 10px;
        }

        .content h5 {
            font-size: 1.5rem;
            color: #666;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 8px;
            font-style: italic;
        }

        .content img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
            transition: transform 0.3s ease;
        }

        .content img:hover {
            transform: scale(1.05);
        }

        .content ul {
            margin: 20px 0;
            padding-left: 20px;
        }

        .content ul li {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .content ul li a {
            color: #ff6600;
            text-decoration: none;
            font-weight: 500;
        }

        .content ul li a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table td {
            background-color: #f9f9f9;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .content h2 {
                font-size: 1.8rem;
            }

            .content h3 {
                font-size: 1.4rem;
            }

            .content h4,
            .content h5 {
                font-size: 1.2rem;
            }

            table {
                font-size: 0.9rem;
            }

            header h1 {
                font-size: 2.5rem;
            }

            header h3 {
                font-size: 1.3rem;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }

            .content img {
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Chemical Reaction</h1>
        <h3>Learn About Chemical Reactions</h3>
        <nav>
            <ul>
                <li><a href="#combustion">Combustion</a></li>
                <li><a href="#decomposition">Decomposition</a></li>
                <li><a href="#neutralization">Neutralization</a></li>
                <li><a href="#redox">Redox</a></li>
                <li><a href="#precipitation">Precipitation</a></li>
                <li><a href="#synthesis">Synthesis</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h2>What is a Chemical Reaction?</h2>
        <p>A chemical reaction is a process where the bonds in reactant molecules are broken, and new bonds are formed
            to create new substances.</p>
        <img src="https://cdn1.byjus.com/wp-content/uploads/2018/03/Chemicals-Reactions.png" alt="Chemical Reactions">

        <h3>Types of Chemical Reactions</h3>
        <ul>
            <li><a href="#combustion">Combustion Reaction</a></li>
            <li><a href="#decomposition">Decomposition Reaction</a></li>
            <li><a href="#neutralization">Neutralization Reaction</a></li>
            <li><a href="#redox">Redox Reaction</a></li>
            <li><a href="#precipitation">Precipitation or Double-Displacement Reaction</a></li>
            <li><a href="#synthesis">Synthesis Reaction</a></li>
        </ul>

        <div id="combustion">
            <h4>1. Combustion Reaction</h4>
            <p>A combustion reaction involves a combustible material reacting with an oxidizer to form an oxidized
                product.</p>
            <h5>Example: 2Mg + O₂ → 2MgO + Heat</h5>
        </div>
        <hr>

        <div id="decomposition">
            <h4>2. Decomposition Reaction</h4>
            <p>A decomposition reaction involves a single compound breaking down into multiple products.</p>
            <h5>Example: CaCO₃ (heat) → CaO + CO₂</h5>
            <img src="https://cdn1.byjus.com/wp-content/uploads/2018/03/Decomposition-Reaction.png"
                alt="Decomposition Reaction">
        </div>
        <hr>
        <div id="neutralization">
            <h4>3. Neutralization Reaction</h4>
            <p>A neutralization reaction is between an acid and a base producing salt and water.</p>
            <h5>Example: HCl + NaOH → NaCl + H₂O</h5>
        </div>
        <hr>

        <div id="redox">
            <h4>4. Redox Reaction</h4>
            <p>Redox reactions involve a transfer of electrons between chemical species.</p>
            <h5>Example: Zn + 2H⁺ → Zn²⁺ + H₂</h5>
        </div>
        <hr>

        <div id="precipitation">
            <h4>5. Precipitation or Double-Displacement Reaction</h4>
            <p>This reaction involves two compounds reacting and switching anions and cations.</p>
            <h5>Example: AgNO₃ + NaCl → AgCl + NaNO₃</h5>
            <img src="https://cdn1.byjus.com/wp-content/uploads/2018/03/Double-Displacement-Reaction.png"
                alt="Precipitation Reaction">
        </div>
        <hr>

        <div id="synthesis">
            <h4>6. Synthesis Reaction</h4>
            <p>A synthesis reaction is when simple compounds combine to form a more complex product.</p>
            <h5>Example: 2Na + Cl₂ → 2NaCl</h5>
        </div>
        <hr>
        <h4>What is an Exothermic Reaction?</h4>
        <p>An exothermic reaction releases energy, typically in the form of heat.</p>

        <h4>What is an Endothermic Reaction?</h4>
        <p>An endothermic reaction absorbs energy from its surroundings, usually in the form of heat.</p>

        <h3>Difference Between Endothermic and Exothermic Reactions</h3>
        <table>
            <tr>
                <th>Property</th>
                <th>Endothermic Reactions</th>
                <th>Exothermic Reactions</th>
            </tr>
            <tr>
                <td>Heat Absorption/Release</td>
                <td>Absorbs heat</td>
                <td>Releases heat</td>
            </tr>
            <tr>
                <td>Temperature Change</td>
                <td>Temperature decreases</td>
                <td>Temperature increases</td>
            </tr>
            <tr>
                <td>Examples</td>
                <td>Photosynthesis</td>
                <td>Combustion</td>
            </tr>
            <tr>
                <td>Energy</td>
                <td>Absorbed</td>
                <td>Released</td>
            </tr>
        </table>
    </div>

    <footer>
        <p>&copy; 2025 Chemical Reactions. All rights reserved.</p>
    </footer>

</body>

</html>