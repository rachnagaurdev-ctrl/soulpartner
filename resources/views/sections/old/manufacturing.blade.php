
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #1a1a3e;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 40px;
        }
        
        /* Section Title */
        .section-title {
            font-size: 48px;
            font-weight: 700;
            color: #1a1a3e;
            margin-bottom: 50px;
        }
        
        /* Tab Navigation */
        .tab-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 50px;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        
        .tab-nav::-webkit-scrollbar {
            height: 4px;
        }
        
        .tab-nav::-webkit-scrollbar-track {
            background: #e0e0e0;
        }
        
        .tab-nav::-webkit-scrollbar-thumb {
            background: #1a1a3e;
            border-radius: 2px;
        }
        
        .nav-arrow {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #ddd;
            background: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        
        .nav-arrow:hover {
            background: #1a1a3e;
            color: #fff;
            border-color: #1a1a3e;
        }
        
        .tab-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s ease;
            font-size: 15px;
            font-weight: 500;
            color: #666;
            border: 1px solid transparent;
        }
        
        .tab-item:hover {
            color: #1a1a3e;
        }
        
        .tab-item.active {
            background: #1a1a3e;
            color: #fff;
            border-color: #1a1a3e;
        }
        
        .tab-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ccc;
            transition: all 0.3s ease;
        }
        
        .tab-item.active .tab-dot {
            background: #e74c3c;
        }
        
        /* Content Area */
        .content-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }
        
        /* Left Content */
        .left-content {
            padding-top: 20px;
        }
        
        .sub-heading {
            font-size: 18px;
            color: #888;
            margin-bottom: 20px;
            font-weight: 400;
        }
        
        .main-heading {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.3;
            color: #1a1a3e;
            margin-bottom: 25px;
        }
        
        .description {
            font-size: 16px;
            line-height: 1.7;
            color: #666;
            margin-bottom: 40px;
        }
        
        /* Stats */
        .stats-container {
            display: flex;
            gap: 40px;
        }
        
        .stat-item {
            flex: 1;
            position: relative;
        }
        
        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: -20px;
            top: 10px;
            bottom: 10px;
            width: 1px;
            background: #e74c3c;
        }
        
        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: #1a1a3e;
            margin-bottom: 8px;
        }
        
        .stat-label {
            font-size: 14px;
            color: #888;
        }
        
        /* Right Content - Image */
        .right-content {
            position: relative;
        }
        
        .image-container {
            width: 100%;
            height: 500px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            background: #e0e0e0;
        }
        
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .image-container:hover img {
            transform: scale(1.05);
        }
        
        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30%;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .content-wrapper {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .image-container {
                height: 400px;
            }
            
            .section-title {
                font-size: 36px;
            }
            
            .main-heading {
                font-size: 28px;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 40px 20px;
            }
            
            .stats-container {
                flex-direction: column;
                gap: 20px;
            }
            
            .stat-item:not(:last-child)::after {
                display: none;
            }
            
            .tab-item {
                padding: 10px 18px;
                font-size: 14px;
            }
        }
        
        /* Animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <div class="container">

        <h3 class="section-title">{{ $data['title'] }}</h3>
        <h1 class="section-title">{{ $data['sub-title'] }}</h1>
        @php
        $active = 1;
        @endphp
        
        <!-- Tab Navigation -->
        <div class="tab-nav">
            @foreach($data['tag'] as $tags)
            <button class="nav-arrow" onclick="scrollTabs(-1)">&#10094;</button>
            
            <div class="tab-item {{$active == 1 ? 'active' : ''}}" data-tab="{{$loop->index}}" onclick="switchTab(this)">
                <span class="tab-dot"></span>
               {{ $tags['tech-tags'] }}
            </div>
            @php
            $active++;
            @endphp
            @endforeach
            <!-- <div class="tab-item" data-tab="tube-bending" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Tube & Rod Bending
            </div>
            <div class="tab-item" data-tab="forging" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Forging
            </div>
            <div class="tab-item" data-tab="machining" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Machining
            </div>
            <div class="tab-item" data-tab="aluminium-casting" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Aluminium Casting
            </div>
            <div class="tab-item" data-tab="investment-casting" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Investment Casting
            </div>
            <div class="tab-item" data-tab="assembled" onclick="switchTab(this)">
                <span class="tab-dot"></span>
                Assembled Components
            </div> -->
            
            <button class="nav-arrow" onclick="scrollTabs(1)">&#10095;</button>
        </div>
        <!-- Content Area -->
        <div class="content-wrapper" id="contentArea">
            <!-- Left Content -->
            @foreach($data['tag'] as $tags)
            <div class="left-content">
                <p class="sub-heading" id="subHeading">{{ $tags['title'] }}</p>
                <h2 class="main-heading" id="mainHeading">
                    {{  $tags['sub-title'] }}
                </h2>
                <p class="description" id="description">
                    {{  $tags['description'] }}
                </p>
                
                <!-- Stats -->
                <div class="stats-container" id="statsContainer">
                    @foreach($tags['info'] as $items)
                    <div class="stat-item">
                        <div class="stat-number">{{$items['number']}}</div>
                        <div class="stat-label">{{$items['details']}}</div>
                    </div>
                    @endforeach
                    <!-- <div class="stat-item">
                        <div class="stat-number">63T-1000T</div>
                        <div class="stat-label">Lorem ipsum dolor</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">400+</div>
                        <div class="stat-label">Lorem ipsum dolor</div>
                    </div> -->
                </div>
            </div>
            @endforeach
            
            <!-- Right Content - Image -->
            <div class="right-content">
                <div class="image-container">
                    <img id="serviceImage" src="https://images.unsplash.com/photo-1565043666747-69f6646db940?w=800&h=600&fit=crop" alt="Manufacturing Machine">
                    <div class="image-overlay"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script>    
        // Data for each tab
        const tabData =  {
            @foreach($data['tag'] as $tags)
            '{{ strtolower($tags['tech-tags']) }}': {
                subHeading: '{{$tags['title']}}',
                heading: '{{ $tags['sub-title'] }}',
                description: '{{ $tags['description'] }}',
                stats: [
                    @foreach($tags['info'] as $item)
                    { number: '{{$item['number']}}', label: '{{$item['details']}}' },
                    @endforeach 
                    // { number: '63T-1000T', label: 'Lorem ipsum dolor' },
                    // { number: '400+', label: 'Lorem ipsum dolor' }
                ],
                image: 'https://images.unsplash.com/photo-1565043666747-69f6646db940?w=800&h=600&fit=crop'
            },
            @endforeach
            // 'tube-bending': {
            //     subHeading: 'About Tube & Rod Bending',
            //     heading: 'Precision tube and rod bending solutions for complex geometries and tight tolerances.',
            //     description: 'Our advanced CNC tube bending machines handle diameters from 6mm to 150mm with multiple radius capabilities. We specialize in mandrel bending for thin-wall applications and rotary draw bending for high-precision components.',
            //     stats: [
            //         { number: '25', label: 'CNC Machines' },
            //         { number: '6-150mm', label: 'Diameter Range' },
            //         { number: '99.8%', label: 'Accuracy Rate' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&h=600&fit=crop'
            // },
            // 'forging': {
            //     subHeading: 'About Forging',
            //     heading: 'Hot and cold forging capabilities for high-strength metal components.',
            //     description: 'We operate hydraulic presses up to 2500 tons, producing forged parts with superior grain structure and mechanical properties. Our forging processes include open-die, closed-die, and precision forging.',
            //     stats: [
            //         { number: '2500T', label: 'Max Press Capacity' },
            //         { number: '50+', label: 'Alloy Types' },
            //         { number: '100K', label: 'Parts/Month' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1535813547-99c456a41d4a?w=800&h=600&fit=crop'
            // },
            // 'machining': {
            //     subHeading: 'About Machining',
            //     heading: 'Multi-axis CNC machining for intricate parts with tight tolerances.',
            //     description: 'Our machining centers feature 5-axis capability, live tooling, and automated pallet systems. We machine aluminum, steel, titanium, and exotic alloys with surface finishes down to Ra 0.4.',
            //     stats: [
            //         { number: '80+', label: 'CNC Centers' },
            //         { number: '5-Axis', label: 'Machining Capability' },
            //         { number: '±0.005mm', label: 'Tolerance' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1565043666747-69f6646db940?w=800&h=600&fit=crop'
            // },
            // 'aluminium-casting': {
            //     subHeading: 'About Aluminium Casting',
            //     heading: 'High-pressure die casting and gravity casting for aluminum components.',
            //     description: 'We produce aluminum castings from 50g to 50kg using HPDC, LPDC, and gravity casting processes. Our in-house tooling design ensures rapid prototyping and production ramp-up.',
            //     stats: [
            //         { number: '30', label: 'Die Casting Cells' },
            //         { number: '50g-50kg', label: 'Weight Range' },
            //         { number: '200K', label: 'Units/Month' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&h=600&fit=crop'
            // },
            // 'investment-casting': {
            //     subHeading: 'About Investment Casting',
            //     heading: 'Lost-wax investment casting for complex geometries and fine details.',
            //     description: 'Our investment casting facility produces near-net-shape components with excellent surface finish. We cast stainless steel, carbon steel, and superalloys for critical applications.',
            //     stats: [
            //         { number: '15', label: 'Casting Lines' },
            //         { number: '0.5-100kg', label: 'Cast Weight' },
            //         { number: 'Ra 3.2', label: 'Surface Finish' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1535813547-99c456a41d4a?w=800&h=600&fit=crop'
            // },
            // 'assembled': {
            //     subHeading: 'About Assembled Components',
            //     heading: 'Full assembly and sub-assembly services with integrated quality control.',
            //     description: 'We provide complete assembly solutions including mechanical assembly, electrical integration, testing, and packaging. Our assembly lines are equipped with torque monitoring and vision inspection systems.',
            //     stats: [
            //         { number: '12', label: 'Assembly Lines' },
            //         { number: '500+', label: 'SKUs Managed' },
            //         { number: '100%', label: 'Inspection Rate' }
            //     ],
            //     image: 'https://images.unsplash.com/photo-1565043666747-69f6646db940?w=800&h=600&fit=crop'
            // }
        };
        
        function switchTab(element) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab-item').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Add active class to clicked tab
            element.classList.add('active');
            
            // Get tab data
            const tabKey = element.getAttribute('data-tab');
            const data = tabData[tabKey];
            
            // Update content with animation
            const contentArea = document.getElementById('contentArea');
            contentArea.classList.remove('fade-in');
            
            setTimeout(() => {
                document.getElementById('subHeading').textContent = data.['title']
                document.getElementById('mainHeading').textContent = data.['sub-title'];
                document.getElementById('description').textContent = data.['description'];
                
                // Update stats
                const statsContainer = document.getElementById('statsContainer');
                statsContainer.innerHTML = data.info.map(stat => `
                    <div class="stat-item">
                        <div class="stat-number">${stat.number}</div>
                        <div class="stat-label">${stat.label}</div>
                    </div>
                `).join('');
                
                // Update image
                document.getElementById('serviceImage').src = data.image;
                
                // Add animation
                contentArea.classList.add('fade-in');
            }, 100);
        }
        
        function scrollTabs(direction) {
            const tabNav = document.querySelector('.tab-nav');
            tabNav.scrollBy({ left: direction * 200, behavior: 'smooth' });
        }
    </script>


with open('/mnt/agents/output/manufacturing_capabilities.html', 'w', encoding='utf-8') as f:
    f.write(html_code)

print("✅ File saved successfully!")
print(f"📄 File size: {len(html_code)} characters")
