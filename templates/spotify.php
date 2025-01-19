<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - World of Music</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            line-height: 1.6;
            padding: 0 15px;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding: 20px 15px;
            background: linear-gradient(90deg, #1db954, #1a774f);
            border-radius: 10px;
            margin: 20px 0;
        }

        header img {
            height: 80px;
        }

        header h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
            flex: 1;
        }

        header h1 span {
            color: #121212;
            background-color: #1db954;
            padding: 5px;
            border-radius: 5px;
        }

        .song-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .song {
            background: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .song:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.5);
        }

        .song img {
            width: 100%;
            height: auto;
        }

        .song-details {
            padding: 15px;
            text-align: center;
        }

        .song-details h4 {
            font-size: 1.3rem;
            color: #1db954;
            margin-bottom: 10px;
        }

        .song-details ul {
            list-style: none;
            margin-bottom: 10px;
        }

        .song-details li {
            font-size: 0.9rem;
            color: #c0c0c0;
            margin-bottom: 5px;
        }

        .song-details audio {
            width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            padding: 10px;
            background: #1e1e1e;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #c0c0c0;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }

            header img {
                height: 60px;
            }

            .song-details h4 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <img src="../image/spotify.png" alt="Spotify Logo">
        <h1><span>S</span>potify the World of Music</h1>
    </header>

    <div class="song-container"></div>

    <footer>
        &copy; 2025 Spotify World | Made with ❤️ for Music Lovers
    </footer>

    <script>
        const songContainer = document.querySelector('.song-container');
        const songs = [
            {
                title: 'Oonchi Oonchi Deewarein - Yaariyan 2',
                singer: 'Arijit Singh',
                image: 'https://i.ytimg.com/vi/CU2Y8npK1Og/maxresdefault.jpg',
                audio: 'https://samplelib.com/lib/preview/mp3/sample-3s.mp3',
                date: '11 Jul, 2024'
            },
            {
                title: 'Guli Mata',
                singer: 'Shreya Ghoshal, Saad Lamjarred',
                image: 'https://i.ytimg.com/vi/xO9rkt87lRU/maxresdefault.jpg',
                audio: 'https://samplelib.com/lib/preview/mp3/sample-3s.mp3',
                date: '15 Mar, 2023'
            },
            {
                title: 'Mere Yaara - Sooryavanshi',
                singer: 'Arijit Singh, Neeti Mohan',
                image: 'https://i.ytimg.com/vi/FpRxiMIt7zQ/maxresdefault.jpg',
                audio: 'https://samplelib.com/lib/preview/mp3/sample-3s.mp3',
                date: '5 Nov, 2021'
            },
            {
                title: 'Manike Mage Hithe - Thank God',
                singer: 'Yohani, Jubin Nautiyal',
                image: 'https://i.ytimg.com/vi/U8H3ugtx-6U/maxresdefault.jpg',
                audio: 'https://samplelib.com/lib/preview/mp3/sample-3s.mp3',
                date: '21 Aug, 2022'
            },
            {
                title: 'Kesariya - Brahmastra',
                singer: 'Arijit Singh',
                image: 'https://i.ytimg.com/vi/BddP6PYo2gs/maxresdefault.jpg',
                audio: 'https://samplelib.com/lib/preview/mp3/sample-3s.mp3',
                date: '6 Sep, 2022'
            }
        ];

        songs.forEach(({ title, singer, image, audio, date }) => {
            songContainer.innerHTML += `
                <div class="song">
                    <img src="${image}" alt="${title}">
                    <div class="song-details">
                        <h4>${title}</h4>
                        <ul>
                            <li><b>Singer:</b> ${singer}</li>
                            <li><b>Released/Updated On:</b> ${date}</li>
                        </ul>
                        <audio controls>
                            <source src="${audio}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            `;
        });
    </script>
</body>

</html>
