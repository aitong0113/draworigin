@extends('front.layout')
@section('title', '老師時間軸')

@section('content')

<div class="teacher-page">

  <link rel="stylesheet" href="/front/about/aboutus_1/css/teacher.css">

  <!-- Tabs -->
  <div class="teacher-tabs">
    <button class="tab-btn active" data-teacher="abbie">Abbie 老師</button>
    <button class="tab-btn" data-teacher="john">John 老師</button>
    <button class="tab-btn" data-teacher="mary">Mary 老師</button>
  </div>

  <!-- 老師內容 -->
  @foreach (['abbie'=>'Abbie 老師','john'=>'John 老師','mary'=>'Mary 老師'] as $id => $name)
  <div class="teacher-content {{ $id==='abbie'?'active':'' }}" id="{{ $id }}">
    <div class="teacher-section">
      <div class="teacher-container">
        <div class="teacher-text">
          <h2 class="maintitle">{{ $name }}</h2>
          <p>
            @if($id==='abbie')
            擁有多年插畫教學經驗，專長於 Procreate 數位插畫與傳統手繪。<br>
            鼓勵學生用色彩表達情感，從日常汲取靈感。<br><br>
            曾帶領學生參加插畫展覽、品牌合作與設計專案，致力於讓藝術走進每個人的生活。
            @elseif($id==='john')
            專長於美術基礎、透視設計、角色設計，曾任設計專案總監。
            @else
            插畫家、兒童繪本設計師，曾獲國際插畫比賽獎。
            @endif
          </p>
        </div>
        <div class="teacher-img">
          <img src="{{ $id==='abbie'?'/front/about/aboutus_1/img/AB.jpg':'https://picsum.photos/400/300?random='.($id==='john'?2:3) }}">
        </div>
      </div>
    </div>
    <div class="teacher-timeline">
      <h2 style="text-align:center; font-size:28px; font-weight:bold;">老師經驗</h2>
      <ul></ul>
      <button class="more-btn">更多紀錄</button>
    </div>
  </div>
  @endforeach

  <h2 style="text-align:center; font-size:28px; font-weight:bold; margin:40px 0 20px;">
    老師作品
  </h2>
  <div class="teacher-works"></div>

  <script>
    'use strict';
    document.addEventListener('DOMContentLoaded', () => {
      // 資料
      const teacherData = {
        abbie: {
          timeline: [{
              src: '/front/about/aboutus_1/img/ex1.jpg',
              date: '2022.05',
              content: '東海大學 藝術技巧與表現學分證書'
            },
            {
              src: '/front/about/aboutus_1/img/ex2.jpg',
              date: '2022.06',
              content: '台灣繪本協會 繪本創作師'
            },
            {
              src: '/front/about/aboutus_1/img/po2.jpg',
              date: '2022.06',
              content: '《阿公帶我出去玩》出版'
            },
            {
              src: '/front/about/aboutus_1/img/po2-2.jpg',
              date: '2022.12',
              content: '《繪本鳥》聯合插畫展'
            },

            {
              src: '/front/about/aboutus_1/img/po2-1.jpg',
              date: '2020.08',
              content: '《丹妮的花》出版'
            },

            {
              src: '/front/about/aboutus_1/img/ex3.jpg',
              date: '2023.02',
              content: '《丹妮的花》繪本得獎'
            },
            {
              src: '/front/about/aboutus_1/img/ex6.jpg',
              date: '2023.06',
              content: 'Photoshop藍貴蓮商業插畫結訓'
            },
            {
              src: '/front/about/aboutus_1/img/ex4.jpg',
              date: '2023.07',
              content: '繪畫分析師 高階證書'
            },
            {
              src: '/front/about/aboutus_1/img/ex5.jpg',
              date: '2023.01-06',
              content: '葳格幼兒園 藝術老師'
            }
          ],
          works: [{
              src: '/front/product/productlist/img/00.jpg',
              title: '《貓湯屋女孩》'
            },
            {
              src: '/front/product/productlist/img/01.jpg',
              title: '《溜冰的商務機器人》'
            },
            {
              src: '/front/product/productlist/img/02.jpg',
              title: '《跳芭蕾舞的刺蝟小姐》'
            },
            {
              src: '/front/product/productlist/img/05.jpg',
              title: '《時間賽跑》'
            },
            {
              src: '/front/product/productlist/img/06.jpg',
              title: '《摩羯座》'
            },
            {
              src: '/front/product/productlist/img/07.jpg',
              title: '《Mommy Time》'
            },
            {
              src: '/front/product/productlist/img/10.jpg',
              title: '《探險階梯》'
            },
            {
              src: '/front/product/productlist/img/09.jpg',
              title: '《看不見的商店》'
            }
          ]
        },
        john: {
          timeline: [{
              src: '/front/about/aboutus_1/img/john1.jpg',
              date: '2021.05',
              content: 'John 老師 2021 年角色設計課程'
            },
            {
              src: '/front/about/aboutus_1/img/john2.jpg',
              date: '2020.11',
              content: '擔任遊戲概念美術總監'
            }
          ],
          works: [{
              src: '/front/product/productlist/img/11.jpg',
              title: '《John作品1》'
            },
            {
              src: '/front/product/productlist/img/12.jpg',
              title: '《John作品2》'
            }
          ]
        },
        mary: {
          timeline: [{
              src: '/front/about/aboutus_1/img/mary1.jpg',
              date: '2021.03',
              content: 'Mary 老師 2021 國際插畫比賽銀獎'
            },
            {
              src: '/front/about/aboutus_1/img/mary2.jpg',
              date: '2019.09',
              content: '繪本出版《小狐狸的祕密花園》'
            }
          ],
          works: [{
              src: '/front/product/productlist/img/13.jpg',
              title: '《Mary作品1》'
            },
            {
              src: '/front/product/productlist/img/14.jpg',
              title: '《Mary作品2》'
            }
          ]
        }
      };

      // 動態渲染時間軸
      function renderTimeline(id) {
        const container = document.querySelector(`#${id} .teacher-timeline ul`);
        const data = teacherData[id].timeline;
        container.dataset.index = 0; // 存目前顯示到哪
        container.innerHTML = '';
        showMore(id);
      }

      // 顯示更多
      function showMore(id) {
        const container = document.querySelector(`#${id} .teacher-timeline ul`);
        const btn = document.querySelector(`#${id} .teacher-timeline .more-btn`);
        const data = teacherData[id].timeline;
        let index = parseInt(container.dataset.index) || 0;
        const step = 4;

        const slice = data.slice(index, index + step);
        slice.forEach(item => {
          const li = document.createElement('li');
          li.innerHTML = `
        <a href="javascript:;">
          <div class="pic"><img src="${item.src}"></div>
          <div class="txt"><h3>${item.date}</h3><p>${item.content}</p></div>
        </a>`;
          container.appendChild(li);
        });

        index += step;
        container.dataset.index = index;
        btn.style.display = index >= data.length ? 'none' : 'block';
      }

      // 渲染作品
      function renderWorks(id) {
        const worksContainer = document.querySelector('.teacher-works');
        worksContainer.innerHTML = '';
        teacherData[id].works.forEach(work => {
          const div = document.createElement('div');
          div.className = 'work-item';
          div.innerHTML = `<img src="${work.src}" alt="${work.title}"><p>${work.title}</p>`;
          worksContainer.appendChild(div);
        });
      }

      // 初始化所有老師 timeline
      ['abbie', 'john', 'mary'].forEach(renderTimeline);
      renderWorks('abbie');

      // Tabs 切換
      document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.dataset.teacher;
          document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          document.querySelectorAll('.teacher-content').forEach(c => c.classList.toggle('active', c.id === id));
          renderTimeline(id);
          renderWorks(id);
        });
      });

      // 用事件委派監聽所有「更多紀錄」
      document.body.addEventListener('click', e => {
        if (e.target.classList.contains('more-btn')) {
          const parent = e.target.closest('.teacher-content');
          if (parent) showMore(parent.id);
        }
      });
    });
  </script>

</div>
@endsection