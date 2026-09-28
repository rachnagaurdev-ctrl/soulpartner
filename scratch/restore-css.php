<?php
$cssFile = 'public/assets/css/style.css';
$content = file_get_contents($cssFile);

$oldBlock = <<<CSS
.category-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 24px;
    margin-top: 30px;
}
@media (min-width: 576px) {
    .category-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 768px) {
    .category-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (min-width: 992px) {
    .category-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}
@media (min-width: 1200px) {
    .category-grid {
        grid-template-columns: repeat(5, 1fr);
    }
}

.category-card {
    border: 1px solid #f0f0f0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    background: #fff;
    text-decoration: none;
    text-align: center;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
}

.category-img {
    position: relative;
    height: 160px;
    z-index: 10;
}

.category-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-icon {
    position: absolute;
    bottom: -18px;
    left: 50%;
    transform: translateX(-50%);
    width: 36px;
    height: 36px;
    background-color: #ff1493;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    border: 3px solid #fff;
    z-index: 2;
}

.category-body {
    padding: 30px 20px 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.category-title {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 6px;
    color: #2c3e50;
}

.category-desc {
    font-size: 0.85rem;
    color: #7f8c8d;
    margin-bottom: 15px;
    flex-grow: 1;
    line-height: 1.4;
}

.category-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    font-size: 0.8rem;
    color: #555;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f0f0f0;
}

.category-meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.category-meta-icon {
    color: #ff1493;
    font-size: 0.9rem;
}

.category-meta-text {
    font-weight: 600;
    color: #34495e;
    white-space: nowrap;
}

.category-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 8px 0;
    border: 1px solid #ffccdf;
    border-radius: 20px;
    color: #ff1493;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    background: transparent;
}

.category-btn:hover {
    background: #ff1493;
    color: #fff;
    border-color: #ff1493;
}

.category-btn i {
    margin-left: 6px;
    font-size: 0.75rem;
}
CSS;

$pattern = '/(\/\* --- Extracted from resources\/views\/sections\/home-category\.blade\.php --- \*\/)(.*?)(\/\* --- Extracted from resources\/views\/sections\/home-category\.blade\.php --- \*\/)/is';
$replacement = "$1\n$oldBlock\n$3";

$newContent = preg_replace($pattern, $replacement, $content, 1);

file_put_contents($cssFile, $newContent);
echo "Restored original home-category CSS in style.css.\n";
