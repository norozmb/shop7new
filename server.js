const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');
const querystring = require('querystring');

const PORT = process.env.PORT || 8000;
const PUBLIC_DIR = __dirname;

// In-memory session & database state loaded from initial shop.sql data
let state = {
  users: [
    { id: 1, name: 'noroz', email: 'noroz@gmail.com', pwd: '827ccb0eea8a706c4c34a16891f84e7b', status: 'active' }
  ],
  categories: [
    { id: 7, cat_name: 'Microphones', parent_id: 0 },
    { id: 8, cat_name: 'Dynamic Microphones', parent_id: 7 },
    { id: 9, cat_name: 'Condenser Microphones', parent_id: 7 },
    { id: 10, cat_name: 'Wireless Microphones', parent_id: 7 }
  ],
  brands: [
    { id: 4, brand_name: 'RØDE' },
    { id: 5, brand_name: 'Audio-Technica' },
    { id: 6, brand_name: 'Universal Audio' },
    { id: 7, brand_name: 'Samson' },
    { id: 8, brand_name: 'Pyle' }
  ],
  products: [
    { id: 3, order_id: '1', product_name: 'Dynamic microphones', product_des: 'Dynamic microphones that are great for all your audio needs | Sound Museo', product_price: 37, product_qty: 10, product_img: '1.webp', product_status: 1, cat_id: 8, brand_id: 4 },
    { id: 5, order_id: '2', product_name: 'NT1 Studio Condenser Mic', product_des: 'Vocal Legend With its exceptionally smooth frequency response, ultra-low self-noise and tight cardioid polar pattern, NT1 is the go-to studio microphone.', product_price: 159, product_qty: 15, product_img: 'RØDE_NT1_SM6_KIT_3-QUARTER_LEFT_FRONT_1080x1080.png', product_status: 1, cat_id: 9, brand_id: 4 },
    { id: 6, order_id: '3', product_name: 'A Dynamic Cardioid Microphone', product_des: 'A dynamic microphone is a passive mic that utilizes a conductive coil attached to its diaphragm to produce crisp sound.', product_price: 67, product_qty: 8, product_img: '2.jpg', product_status: 1, cat_id: 8, brand_id: 4 },
    { id: 7, order_id: '4', product_name: 'Audio-Technica ATR2100x-USB', product_des: 'Audio-Technica ATR2100x-USB Cardioid Dynamic Microphone (ATR Series) with USB and XLR Outputs.', product_price: 41, product_qty: 12, product_img: '5.jpg', product_status: 1, cat_id: 8, brand_id: 5 },
    { id: 8, order_id: '5', product_name: 'Zoom Dynamic Podcast Mic', product_des: 'Zoom Dynamic Microphone for Podcasts, Voice-Overs, Interviews, Vocals, and More with Sturdy Metal Body.', product_price: 89, product_qty: 5, product_img: '6.jpg', product_status: 1, cat_id: 8, brand_id: 7 },
    { id: 10, order_id: '8', product_name: 'Universal Audio SD-1 Standard Dynamic', product_des: 'Universal Audio SD-1 Standard Dynamic Microphone in White. Perfect for broadcasting, podcasting, and studio recording.', product_price: 299, product_qty: 6, product_img: '8.jpg', product_status: 1, cat_id: 8, brand_id: 6 },
    { id: 11, order_id: '9', product_name: 'Audio-Technica AT2005USB Handheld', product_des: 'Audio-Technica AT2005USB Cardioid Dynamic USB/XLR Microphone in Black.', product_price: 61, product_qty: 20, product_img: '9.webp', product_status: 1, cat_id: 8, brand_id: 5 },
    { id: 14, order_id: '13', product_name: 'Professional Dynamic Vocal Mic', product_des: 'Professional Dynamic Vocal Microphone with On and Off Switch, Cardioid Dynamic Handheld Metal XLR Mic.', product_price: 14.76, product_qty: 25, product_img: '12.jpg', product_status: 1, cat_id: 8, brand_id: 8 },
    { id: 15, order_id: '14', product_name: 'Pyle 3-Piece Professional Dynamic Kit', product_des: 'Pyle 3 Piece Professional Dynamic Microphone Kit Cardioid Unidirectional Vocal Handheld MIC with Hard Carry Case.', product_price: 85.98, product_qty: 7, product_img: '14.jpg', product_status: 1, cat_id: 8, brand_id: 8 },
    { id: 17, order_id: '17', product_name: 'Samson Technologies Q9U Broadcast Mic', product_des: 'Samson Technologies Q9U Dynamic Broadcast Microphone, XLR/USB, Black.', product_price: 54, product_qty: 9, product_img: '16.jpg', product_status: 1, cat_id: 8, brand_id: 7 },
    { id: 18, order_id: '19', product_name: 'UA Volt 276 Studio Recording Pack', product_des: 'UA Volt 276 Studio Pack for recording, podcasting, and streaming with USB Interface, Mic, and Headphones.', product_price: 311, product_qty: 4, product_img: '17.webp', product_status: 1, cat_id: 9, brand_id: 6 },
    { id: 19, order_id: '20', product_name: 'Pyle UHF Wireless System Kit', product_des: 'Pyle UHF Wireless System Kit Portable Professional Battery Operated Handheld Dynamic Unidirectional Cordless Mic.', product_price: 211, product_qty: 11, product_img: '18.webp', product_status: 1, cat_id: 10, brand_id: 8 }
  ],
  cart: [],
  contactMessages: []
};

const mimeTypes = {
  '.html': 'text/html; charset=utf-8',
  '.php': 'text/html; charset=utf-8',
  '.css': 'text/css',
  '.js': 'application/javascript',
  '.json': 'application/json',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.jfif': 'image/jpeg',
  '.webp': 'image/webp',
  '.gif': 'image/gif',
  '.svg': 'image/svg+xml',
  '.ico': 'image/x-icon',
  '.ttf': 'font/ttf',
  '.woff': 'font/woff',
  '.woff2': 'font/woff2',
  '.eot': 'application/vnd.ms-fontobject'
};

const server = http.createServer((req, res) => {
  const parsedUrl = url.parse(req.url, true);
  let pathname = parsedUrl.pathname;

  if (pathname === '/') pathname = '/index.php';

  // Normalize path
  const targetPath = path.join(PUBLIC_DIR, pathname);

  // Serve static assets if file exists and is not a PHP page
  const ext = path.extname(pathname).toLowerCase();
  
  if (ext && ext !== '.php' && fs.existsSync(targetPath) && fs.statSync(targetPath).isFile()) {
    const contentType = mimeTypes[ext] || 'application/octet-stream';
    res.writeHead(200, { 'Content-Type': contentType, 'Access-Control-Allow-Origin': '*' });
    fs.createReadStream(targetPath).pipe(res);
    return;
  }

  // Handle static images in upload directory
  if (pathname.startsWith('/admin/upload/') || pathname.startsWith('/upload/')) {
    const filename = path.basename(pathname);
    const imgPath = path.join(PUBLIC_DIR, 'admin', 'upload', filename);
    if (fs.existsSync(imgPath)) {
      const imgExt = path.extname(filename).toLowerCase();
      res.writeHead(200, { 'Content-Type': mimeTypes[imgExt] || 'image/jpeg', 'Access-Control-Allow-Origin': '*' });
      fs.createReadStream(imgPath).pipe(res);
      return;
    }
  }

  // Check if target file exists for direct PHP file serving with fallback
  if (fs.existsSync(targetPath) && fs.statSync(targetPath).isFile()) {
    res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8', 'Access-Control-Allow-Origin': '*' });
    let content = fs.readFileSync(targetPath, 'utf8');

    // Clean PHP tags for browser rendering if needed
    content = content.replace(/<\?php[\s\S]*?\?>/g, (match) => {
      if (match.includes('$_SESSION')) {
        return '';
      }
      return '';
    });

    res.end(content);
    return;
  }

  // 404 Fallback
  res.writeHead(404, { 'Content-Type': 'text/html; charset=utf-8' });
  res.end(`<h1>404 Not Found</h1><p>The requested URL ${pathname} was not found on this server.</p><a href="/">Return Home</a>`);
});

server.listen(PORT, () => {
  console.log(`====================================================`);
  console.log(`🚀 Sound Museo E-Commerce Server is LIVE!`);
  console.log(`🌐 Frontend Storefront: http://localhost:${PORT}/index.php`);
  console.log(`🔐 Admin Panel:        http://localhost:${PORT}/admin/index.php`);
  console.log(`====================================================`);
});
