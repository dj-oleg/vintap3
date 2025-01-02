
let currentAudio = null; // Глобальная переменная для хранения текущего аудио

document.querySelectorAll('.play-button').forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();

    const playIcon = button.querySelector('.play-icon');
    const stopIcon = button.querySelector('.stop-icon');
    const audioFile = button.getAttribute('data-file'); // Или button.dataset.file
    const audioUrl = `https://vintapes.com/modx/${audioFile}`;

    // Проверяем, воспроизводится ли текущая кнопка
    if (button.classList.contains('playing')) {
      // Останавливаем текущее аудио
      if (currentAudio) currentAudio.pause();
      button.classList.remove('playing');
      playIcon.classList.remove('hidden');
      stopIcon.classList.add('hidden');
      currentAudio = null; // Сбрасываем текущий аудио
    } else {
      // Если есть другое воспроизводимое аудио, останавливаем его
      if (currentAudio) {
        document.querySelectorAll('.play-button.playing').forEach(activeButton => {
          activeButton.classList.remove('playing');
          activeButton.querySelector('.play-icon').classList.remove('hidden');
          activeButton.querySelector('.stop-icon').classList.add('hidden');
        });
        currentAudio.pause();
      }

      // Воспроизводим новое аудио
      currentAudio = new Audio(audioUrl); // Сохраняем новое аудио
      currentAudio.play().then(() => {
        button.classList.add('playing');
        playIcon.classList.add('hidden');
        stopIcon.classList.remove('hidden');
      }).catch(error => {
        console.error('Ошибка воспроизведения:', error.message);
        currentAudio = null; // Сбрасываем текущий аудио при ошибке
      });

      // Останавливаем аудио, если оно завершилось
      currentAudio.onended = () => {
        button.classList.remove('playing');
        playIcon.classList.remove('hidden');
        stopIcon.classList.add('hidden');
        currentAudio = null; // Сбрасываем текущий аудио
      };
    }
  });
});
