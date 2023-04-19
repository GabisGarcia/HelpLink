<?php
    $this->extend('header');

    $this->section('title');

        echo "HelpLink";

    $this->endSection();

    $this->section('content');
?>


<div class="swiffy-slider">
    <ul class="slider-container">
        <li><img src="https://i.pinimg.com/originals/73/b1/2e/73b12eaf89a0e032842d47db3cab34d2.png" style="max-width: 100%;height: auto;"></li>
        <li><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgICAcICAgIBwcHBwoHBwcHCA8ICQcKFREWFiARHx8YHSggGBolGxMfITEhJSkrLi4uFx8zODMsNygtLisBCgoKDQ0NDg0NEi0ZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAK4BIgMBIgACEQEDEQH/xAAXAAEBAQEAAAAAAAAAAAAAAAAAAQIG/8QAFxABAQEBAAAAAAAAAAAAAAAAABEBIf/EABcBAQEBAQAAAAAAAAAAAAAAAAABBQT/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwDpwHO1AFAAAUAAUEUABQEUAAAAAEUBBQEABBUARQEABBUAAAAAAAUAFRQAUAFAAAFAAABQEIoCAAIoCCoCCoCCoAigIACAAAALiKAACgAoACgAoAAoAAAoCCgIKgIKgAAIACAAgaAgaAIqAAAKigLiKAqKAqKAqKAGAKGAKGAAKggqAAKIACGgAipoCKgCKgCKgCKmgAAoAKACgAoACooGAAoAKIoCoIKgAAKIACAaAmqgCKgCKgCKgCKgAAKCgKigKigAAAAoigKgCgAogCiAAACAAACAAgAJoACKgCKAgoAqKAqYoKACgAgAAAKIAoACoAogAAACAAAIAAABFASI0gIABAAQAFVFAVFAAABAAAUAFEAVAAAAoAAAAAIAAqKBBQERpAZFTAIKAkWCgigAAAKAhFUGYRoBIRoBIRQEhFUGYkbQGYRoBmEaAZhFAZhGgGYjQDPS6oCUqoBUUBBQFEUAAFEAURQFQBRAFEAaGQGhkoNDNKDQyAogCiAKgAAgKIAAAAgCooIAAACiAKIAogCiAKAAAAAAAAAAAAIUFEAUQBRAAAAAAAH/2Q==" style="max-width: 100%;height: auto;"></li>
        <li><img src="https://i.pinimg.com/originals/73/b1/2e/73b12eaf89a0e032842d47db3cab34d2.png" style="max-width: 100%;height: auto;"></li>
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <div class="slider-indicators">
        <button class="active"></button>
        <button></button>
        <button></button>
    </div>
</div>


<?php
    $this->endSection();
?>