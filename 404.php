<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>404 — Страница не найдена | EasyVisa World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap&subset=cyrillic" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #151f2b 75%, #283754 100%);
      font-family: 'Russo One', Arial, sans-serif;
      margin: 0;
      color: #fff;
    }
    .gta-404-main {
      max-width: 470px;
      margin: 60px auto 30px auto;
      background: linear-gradient(120deg, #212b36ee 88%, #1fa96c33 100%);
      border-radius: 2.5rem;
      box-shadow: 0 0 60px 8px #29fc9444, 0 0 0 4px #29fc94;
      padding: 2.8rem 1.1rem 2.3rem 1.1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .gta-404-title {
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 4.2rem;
      color: #ffe95d;
      letter-spacing: 0.15em;
      text-shadow: 0 4px 28px #151f2bcc, 0 0 2px #000;
      margin-bottom: 0.2em;
      text-align: center;
    }
    .gta-404-sub {
      text-align: center;
      font-size: 1.25rem;
      color: #29fc94;
      margin-bottom: 2.4rem;
      font-family: 'Russo One', Arial, sans-serif;
      text-shadow: 0 2px 18px #2cffd9a6;
    }
    /* 2048 */
    .game-2048-container {
      background: #202a37;
      border-radius: 1.7rem;
      box-shadow: 0 0 18px #29fc9440, 0 0 0 3px #29fc94 inset;
      padding: 1.8rem 1.8rem 1.4rem 1.8rem;
      width: 334px;
      margin: 0 auto 1.9em auto;
      display: flex; flex-direction: column; align-items: center;
    }
    .game-2048-title {
      color: #ffe95d;
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 2.2rem;
      margin-bottom: 0.5em;
      letter-spacing: 0.06em;
      text-shadow: 0 2px 12px #ffe95d66;
      text-align: center;
    }
    .score {
      color: #fff;
      font-size: 1.12rem;
      font-weight: 600;
      margin-bottom: 0.9em;
      letter-spacing: .03em;
      text-align: center;
    }
    .board {
      display: grid;
      grid-template-columns: repeat(4, 62px);
      grid-template-rows: repeat(4, 62px);
      gap: 0.54em;
      margin-bottom: 1.15em;
      user-select: none;
    }
    .cell {
      background: #283a3f;
      border-radius: 1.1em;
      color: #29fc94;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.45em;
      font-weight: bold;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 1px 6px #29fc9450, 0 0 0 1.5px #29fc94 inset;
      transition: background 0.12s, color 0.12s;
    }
    .cell.cell-0 { background: #222a32; color: #212d2c; }
    .cell.cell-2 { background: #fcfae5; color: #0e1f13; }
    .cell.cell-4 { background: #f6f5b4; color: #387d46; }
    .cell.cell-8 { background: #fff35d; color: #1b3925; }
    .cell.cell-16 { background: #29fc94; color: #253026; }
    .cell.cell-32 { background: #1fa96c; color: #fffbe8; }
    .cell.cell-64 { background: #12e5af; color: #2a1818; }
    .cell.cell-128 { background: #ffb13c; color: #1b1d17; }
    .cell.cell-256 { background: #ff9c00; color: #1b1d17; }
    .cell.cell-512 { background: #fc5a21; color: #fff; }
    .cell.cell-1024 { background: #ffd700; color: #191e16; }
    .cell.cell-2048 { background: #29fc94; color: #ffe95d; box-shadow: 0 0 16px #ffe95d, 0 0 7px #29fc94;}
    .game-message {
      color: #ffe95d;
      background: #171a0c;
      border-radius: 1.1em;
      padding: 0.82em 1.3em;
      font-family: 'Bebas Neue', Arial, sans-serif;
      font-size: 1.3em;
      margin: 0.65em auto 0.2em auto;
      text-align: center;
      text-shadow: 0 2px 12px #ffe95d77;
      letter-spacing: 0.01em;
    }
    .game-btn {
      margin-top: 0.9em;
      background: linear-gradient(90deg, #29fc94 18%, #ffe95d 82%);
      color: #20291c;
      font-family: 'Russo One', Arial, sans-serif;
      font-size: 1.07em;
      border: none;
      border-radius: 1.1em;
      padding: 0.7em 1.5em;
      cursor: pointer;
      font-weight: 900;
      letter-spacing: .07em;
      box-shadow: 0 1px 14px #29fc94a0, 0 0 8px #ffe95d60;
      outline: none;
      transition: .15s;
    }
    .game-btn:hover { background: linear-gradient(90deg, #ffe95d 40%, #29fc94 100%); }
    @media (max-width: 600px) {
      .gta-404-main { max-width: 99vw; padding: 1.1rem 0.2rem 1.7rem 0.2rem; }
      .game-2048-container { width: 97vw; padding: 1em 0.5em 0.8em 0.5em;}
      .board { grid-template-columns: repeat(4, 17vw); grid-template-rows: repeat(4, 17vw);}
    }
  </style>
</head>
<body>
<div class="main-header-container-all-page">

<?php include($_SERVER['DOCUMENT_ROOT']."/include/header.php"); ?>
<div class="gta-404-main">
  <div class="gta-404-title">404</div>
  <div class="gta-404-sub">Страница не найдена. Пока вы тут — сыграйте в 2048 😎</div>
  <div class="game-2048-container">
    <div class="game-2048-title">2048</div>
    <div class="score" id="score-2048">Очки: 0</div>
    <div class="board" id="board-2048"></div>
    <div class="game-message" id="msg-2048"></div>
    <button class="game-btn" id="restart-2048">Заново</button>
  </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/footer.php"); ?>
</div>
<script>
// --- 2048 GAME ---
const SIZE = 4;
let board, score, gameOver, gameWon;
function emptyBoard() { return Array.from({length:SIZE},()=>Array(SIZE).fill(0)); }
function randomEmptyCell() {
  let empty = [];
  for(let y=0; y<SIZE; y++) for(let x=0; x<SIZE; x++) if(board[y][x]===0) empty.push([y,x]);
  return empty.length ? empty[Math.floor(Math.random()*empty.length)] : null;
}
function addRandomTile() {
  let cell = randomEmptyCell();
  if(cell) board[cell[0]][cell[1]] = Math.random()<0.88 ? 2 : 4;
}
function drawBoard() {
  let html = "";
  for(let y=0; y<SIZE; y++) for(let x=0; x<SIZE; x++)
    html += `<div class="cell cell-${board[y][x]}">${board[y][x]||""}</div>`;
  document.getElementById('board-2048').innerHTML = html;
  document.getElementById('score-2048').textContent = "Очки: "+score;
}
function move(dir) {
  let moved = false, merged = Array.from({length:SIZE},()=>Array(SIZE).fill(false));
  let delta = {left:[0,1], right:[0,-1], up:[1,0], down:[-1,0]};
  let order = {left:[0,SIZE,1], right:[SIZE-1,-1,-1], up:[0,SIZE,1], down:[SIZE-1,-1,-1]};
  for(let i=order[dir][0]; i!=order[dir][1]; i+=order[dir][2])
    for(let j=order[dir][0]; j!=order[dir][1]; j+=order[dir][2])
      for(let k=0;k<SIZE-1;k++) {
        let y = dir=='left'||dir=='right'?i:j, x = dir=='left'||dir=='right'?j:i;
        let ny = y+delta[dir][0], nx = x+delta[dir][1];
        if(ny<0||ny>=SIZE||nx<0||nx>=SIZE) continue;
        if(board[y][x]!==0&&(board[ny][nx]===0||(!merged[ny][nx]&&board[ny][nx]===board[y][x]))) {
          if(board[ny][nx]===0) { board[ny][nx]=board[y][x]; board[y][x]=0; moved=true; }
          else if(board[ny][nx]===board[y][x]) {
            board[ny][nx]*=2; board[y][x]=0; score+=board[ny][nx]; merged[ny][nx]=true; moved=true;
            if(board[ny][nx]===2048) gameWon=true;
          }
        }
      }
  return moved;
}
function canMove() {
  for(let y=0;y<SIZE;y++) for(let x=0;x<SIZE;x++) if(board[y][x]===0) return true;
  for(let y=0;y<SIZE;y++) for(let x=0;x<SIZE-1;x++) if(board[y][x]===board[y][x+1]) return true;
  for(let x=0;x<SIZE;x++) for(let y=0;y<SIZE-1;y++) if(board[y][x]===board[y+1][x]) return true;
  return false;
}
function restartGame() {
  board = emptyBoard(); score = 0; gameOver = false; gameWon = false;
  addRandomTile(); addRandomTile(); drawBoard();
  document.getElementById('msg-2048').textContent="";
}
function doMove(dir) {
  if(gameOver||gameWon) return;
  if(move(dir)) {
    addRandomTile(); drawBoard();
    if(gameWon) document.getElementById('msg-2048').textContent="Поздравляем! Вы собрали 2048!";
    else if(!canMove()) { gameOver=true; document.getElementById('msg-2048').textContent="Игра окончена 😅"; }
  }
}
document.addEventListener('keydown', e=>{
  if(["ArrowLeft","ArrowRight","ArrowUp","ArrowDown"].includes(e.key)) {
    e.preventDefault();
    doMove({ArrowLeft:"left",ArrowRight:"right",ArrowUp:"up",ArrowDown:"down"}[e.key]);
  }
});
document.getElementById('restart-2048').onclick = restartGame;
restartGame();
</script>
</body>
</html>