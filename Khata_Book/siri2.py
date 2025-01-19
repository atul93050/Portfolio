import pyttsx3
import speech_recognition as sr
import datetime
import wikipedia
import webbrowser
import os
import smtplib
from dotenv import load_dotenv
import time
import sys
import os

# Load environment variables for security
load_dotenv()

EMAIL = os.getenv('EMAIL')
PASSWORD = os.getenv('PASSWORD')

# Initialize text-to-speech engine
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[1].id)

# Function to speak text
def speak(audio):
    engine.say(audio)
    engine.runAndWait()

# Function to greet the user
def wishme():
    hour = int(datetime.datetime.now().hour)
    if 0 <= hour < 12:
        speak("Good Morning Sir!")
    elif 12 <= hour < 18:
        speak("Good Afternoon Sir!")
    else:
        speak("Good Evening Sir!")
    speak("I am your personal assistant Siri! How may I help you?")

# Function to take voice input
def takeCommand():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recognizing...")
        query = r.recognize_google(audio, language='en-in')
        print(f"User said: {query}\n")
    except Exception as e:
        print("Error:", e)
        speak("Sorry, I didn't catch that. Please say it again.")
        return "None"
    return query

# Function to send emails securely
def sendEmail(to, content):
    try:
        server = smtplib.SMTP('smtp.gmail.com', 587)
        server.ehlo()
        server.starttls()
        server.login(EMAIL, PASSWORD)
        server.sendmail(EMAIL, to, content)
        server.close()
        speak("Email has been sent successfully!")
    except Exception as e:
        print(e)
        speak("Sorry, I was unable to send the email.")

# Function to execute commands based on query
def executeCommand(query):
    # Wikipedia search
    if 'wikipedia' in query:
        speak('Searching on Wikipedia...')
        query = query.replace("wikipedia", "")
        results = wikipedia.summary(query, sentences=2)
        speak("According to Wikipedia")
        print(results)
        speak(results)

    # Open websites
    elif 'open youtube' in query:
        webbrowser.open("youtube.com")
    elif 'open google' in query:
        webbrowser.open("google.com")
    elif 'open github' in query:
        webbrowser.open("github.com")
    elif 'open spotify' in query:
        webbrowser.open("spotify.com")
    elif 'open whatsapp' in query:
        whatsapp_path = "C:\\Users\\Asus\\AppData\\Local\\WhatsApp\\WhatsApp.exe"
        if os.path.exists(whatsapp_path):
            os.startfile(whatsapp_path)
        else:
            speak("WhatsApp is not installed on this device.")

    # Play music
    elif 'play music' in query:
        music_dir = 'C:\\Users\\Asus\\Desktop\\p\\snaptube\\download\\SnapTube Audio'
        if os.path.exists(music_dir):
            songs = os.listdir(music_dir)
            if songs:
                os.startfile(os.path.join(music_dir, songs[0]))
            else:
                speak("No music files found in the directory.")
        else:
            speak("Music directory does not exist.")

    # Tell the time
    elif 'time' in query:
        strTime = datetime.datetime.now().strftime("%H:%M:%S")
        speak(f"Sir, the time is {strTime}")

    # Send an email
    elif 'send email' in query:
        try:
            speak("What should I say?")
            content = takeCommand()
            to = "atul800498@gmail.com"
            sendEmail(to, content)
        except Exception as e:
            print(e)
            speak("Sorry, I couldn't send the email.")

    # Open Visual Studio Code
    elif 'open code' in query:
        code_path = "C:\\Users\\Asus\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
        if os.path.exists(code_path):
            os.startfile(code_path)
        else:
            speak("Visual Studio Code is not installed on this device.")

    # Farewell
    elif 'thanks siri' in query or 'thank you siri' in query:
        speak("You're welcome, Sir!")
    elif 'goodbye' in query or 'sleep' in query:
        speak("Goodbye Sir! Have a great day!")
        sys.exit()

    # Other fun responses
    elif 'hello' in query:
        speak("Hello Sir!")
    elif 'i love you' in query:
        speak("I love you too, Sir!")
    elif 'how are you' in query:
        speak("I am doing well, Sir. Thank you for asking!")

# Main program
if __name__ == "__main__":   
    wishme()
    speak("Siri assistance activated ")
    speak("How can i help you")
    while True:
        query = takeCommand().lower()
        executeCommand(query)
