@extends('layouts.dashboard')
@section('title', 'Edit Partner Profile | Soulmate India')
@section('content')
      <div class="middle-col">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="page-header">
            <div class="page-title">
              <h1>
                <svg width="24" height="24" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Edit Partner Profile
              </h1>
              <p>Update your profile information to attract more matches and bookings.</p>
            </div>
            <a href="#" class="btn-outline-primary">
              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
              View My Profile
            </a>
          </div>

          <!-- Profile Photos -->
          <div class="card">
            <div class="card-header">
              <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              Profile Photos
            </div>
            <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Add clear and recent photos. You can upload up to 8 photos.</p>
            <div class="photo-grid" id="photoGrid">
              @php 
                $photos = $user->profile_photos ?? []; 
                if($user->profile_image && !in_array($user->profile_image, $photos)) {
                    array_unshift($photos, $user->profile_image);
                }
              @endphp

              @foreach($photos as $photo)
              <div class="photo-item">
                <img src="{{ asset('storage/' . $photo) }}" alt="Photo">
                @if($user->profile_image == $photo)
                    <span class="photo-primary-badge">Primary</span>
                @else
                    <button type="submit" name="set_primary" value="{{ $photo }}" formnovalidate style="position:absolute; top:5px; left:5px; background:rgba(255,255,255,0.8); border:none; padding:2px 5px; font-size:10px; border-radius:4px; cursor:pointer; color:#E91E63; font-weight:bold; line-height: 1;">Set Primary</button>
                @endif
                <button type="submit" name="delete_photos[]" value="{{ $photo }}" formnovalidate style="position:absolute; top:5px; right:5px; background:rgba(255,0,0,0.8); border:none; padding:2px 5px; font-size:10px; border-radius:4px; cursor:pointer; color:#fff; font-weight:bold; line-height: 1;" onclick="return confirm('Delete this photo?')">✕</button>
              </div>
              @endforeach

              <label for="profileImageInput" class="photo-upload-btn" style="cursor: pointer;" id="addPhotoBtn">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                <span style="font-size: 11px; margin-top: 5px;">Add Photos</span>
                <input type="file" id="profileImageInput" name="profile_photos[]" style="display: none;" accept="image/*" multiple onchange="previewMultiplePhotos(this)">
              </label>
            </div>
            <script>
            function previewMultiplePhotos(input) {
                if (input.files) {
                    for (let i = 0; i < input.files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            let div = document.createElement('div');
                            div.className = 'photo-item';
                            div.innerHTML = '<img src="' + e.target.result + '" alt="Preview"><span class="photo-primary-badge" style="background: #a855f7;">Preview</span>';
                            document.getElementById('photoGrid').insertBefore(div, document.getElementById('addPhotoBtn'));
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
            </script>
          </div>

          <!-- Basic Information & About Me Grid -->
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Basic Information
              </div>
              <div class="form-grid">
                <div class="form-group">
                  <label>Full Name <span>*</span></label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                  <label>Height <span>*</span></label>
                  <select name="height" class="form-control">
                    <option value="5'4&quot; (163 cm)" {{ old('height', $user->height) == '5\'4" (163 cm)' ? 'selected' : '' }}>5'4" (163 cm)</option>
                    <option value="5'5&quot; (165 cm)" {{ old('height', $user->height) == '5\'5" (165 cm)' ? 'selected' : '' }}>5'5" (165 cm)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Date of Birth <span>*</span></label>
                  <input type="date" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}" max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}">
                </div>
                <div class="form-group">
                  <label>Religion <span>*</span></label>
                  <select name="religion" class="form-control">
                    <option value="Hindu" {{ old('religion', $user->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Muslim" {{ old('religion', $user->religion) == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="Christian" {{ old('religion', $user->religion) == 'Christian' ? 'selected' : '' }}>Christian</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gender <span>*</span></label>
                  <select name="gender" class="form-control">
                    @foreach(get_genders() as $key => $val)
                      <option value="{{ strtolower($key) }}" {{ strtolower(old('gender', $user->gender)) == strtolower($key) ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                  </select>
                  <div style="font-size: 11px; color: #94A3B8; margin-top: 5px;">Age: {{ $user->age ?? 26 }}</div>
                </div>
                <div class="form-group">
                  <label>I want to <span>*</span></label>
                  <select name="iwantto" class="form-control">
                    @foreach(get_purposes() as $key => $val)
                      <option value="{{ $key }}" {{ old('iwantto', $user->iwantto) == $key ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Language(s) <span>*</span></label>
                  <select name="languages[]" class="form-control" multiple style="height: 40px;">
                    <option value="Hindi" {{ in_array('Hindi', $user->languages ?? []) ? 'selected' : '' }}>Hindi</option>
                    <option value="English" {{ in_array('English', $user->languages ?? []) ? 'selected' : '' }}>English</option>
                  </select>
                </div>
              </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
              <div class="card" style="flex: 1;">
                <div class="card-header">
                  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                  About Me
                </div>
                <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 10px;">Tell people about yourself, your interests and what you are looking for.</p>
                <textarea name="bio" class="form-control" style="height: 120px;">{{ old('bio', $user->bio) }}</textarea>
                <div class="char-count">212/500</div>
              </div>

              <!-- Location & Availability moved here in CSS flow to match left-right grid alignment -->
            </div>
          </div>

          <!-- Location & Availability -->
          <div class="card">
            <div class="card-header">
              <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              Location & Availability
            </div>
            <div class="form-grid">
              <div class="form-group">
                <label>City <span>*</span></label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
              </div>
              <div class="form-group">
                <label>Pincode <span>*</span></label>
                <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $user->pincode) }}" required>
              </div>
              <div class="form-group" style="grid-column: 1 / -1;">
                <label>Preferred Location</label>
                <select name="preferred_location" class="form-control">
                  <option value="Delhi NCR" {{ old('preferred_location', $user->preferred_location) == 'Delhi NCR' ? 'selected' : '' }}>Delhi NCR</option>
                </select>
              </div>
              <div class="form-group" style="grid-column: 1 / -1;">
                <label>Availability Schedule <span>*</span></label>
                <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 10px;">
                  @php
                      $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                      $availabilities = old('availability', $user->availability ?? []);
                  @endphp
                  @foreach($days as $day)
                  @php
                      $dayActive = isset($availabilities[$day]) && isset($availabilities[$day]['active']);
                      $fromTime = $availabilities[$day]['from'] ?? '09:00';
                      $toTime = $availabilities[$day]['to'] ?? '18:00';
                  @endphp
                  <div style="display: flex; align-items: center; gap: 15px;">
                      <label style="margin:0; display:flex; align-items:center; cursor:pointer;">
                          <input type="checkbox" name="availability[{{$day}}][active]" value="1" style="display:none;" onchange="this.nextElementSibling.style.background = this.checked ? '#a855f7' : '#fff'; this.nextElementSibling.style.color = this.checked ? '#fff' : '#64748B';" {{ $dayActive ? 'checked' : '' }}>
                          <span style="display:inline-block; width: 60px; text-align:center; padding: 8px 0; border-radius: 8px; border: 1px solid #e2e8f0; font-weight: 500; font-size: 13px; background: {{ $dayActive ? '#a855f7' : '#fff' }}; color: {{ $dayActive ? '#fff' : '#64748B' }};">{{ $day }}</span>
                      </label>
                      <select name="availability[{{$day}}][from]" class="form-control" style="width: 100px; padding: 8px;">
                          @for($i=0; $i<24; $i++)
                          @php 
                              $t = sprintf('%02d:00', $i); 
                              $displayT = \Carbon\Carbon::createFromFormat('H:i', $t)->format('h:i A');
                          @endphp
                          <option value="{{ $t }}" {{ $fromTime == $t ? 'selected' : '' }}>{{ $displayT }}</option>
                          @endfor
                      </select>
                      <span style="color: #64748B; font-size: 13px;">to</span>
                      <select name="availability[{{$day}}][to]" class="form-control" style="width: 100px; padding: 8px;">
                          @for($i=0; $i<24; $i++)
                          @php 
                              $t = sprintf('%02d:00', $i); 
                              $displayT = \Carbon\Carbon::createFromFormat('H:i', $t)->format('h:i A');
                          @endphp
                          <option value="{{ $t }}" {{ $toTime == $t ? 'selected' : '' }}>{{ $displayT }}</option>
                          @endfor
                      </select>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- Categories, Interests & Looking For Grid -->
          <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                My Categories
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Select your primary categories (you can choose multiple).</p>
              
              @php
                  $userCategories = explode(',', old('category', $user->category ?? ''));
                  $userCategoryPrices = old('category_prices', is_array($user->category_prices) ? $user->category_prices : json_decode($user->category_prices, true) ?? []);
              @endphp
              <div class="pill-group" style="display: flex; flex-wrap: wrap; gap: 10px;">
                @foreach($categories as $category)
                @php
                    $isChecked = in_array($category->slug, $userCategories);
                    $priceValue = $userCategoryPrices[$category->slug] ?? $category->prices;
                @endphp
                <label class="category-pill-wrapper" style="margin: 0; cursor: pointer;">
                  <input type="checkbox" name="category[]" value="{{ $category->slug }}" class="pill-checkbox" {{ $isChecked ? 'checked' : '' }} onchange="togglePriceInput(this, 'price_input_{{ $category->slug }}')">
                  <span class="pill-label" style="display: inline-flex; align-items: center; gap: 6px; transition: all 0.3s ease;">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: {{ $isChecked ? 'inline-block' : 'none' }}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ $category->name }}
                    
                    <!-- Price Input inside the pill -->
                    <span id="price_input_{{ $category->slug }}" class="category-price-input" style="display: {{ $isChecked ? 'inline-flex' : 'none' }}; align-items: center; background: rgba(255, 255, 255, 0.9); padding: 2px 8px; border-radius: 12px; margin-left: 4px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.05); border: 1px solid #fbcfe8;">
                      <span style="color: #E91E63; font-weight: 700; font-size: 12px; margin-right: 2px;">₹</span>
                      <input type="number" name="category_prices[{{ $category->slug }}]" value="{{ $priceValue ? floatval($priceValue) : '' }}" placeholder="{{ floatval($category->prices) }}" style="width: 45px; border: none; background: transparent; outline: none; font-size: 12px; color: #E91E63; font-weight: 700; padding: 0;" onclick="event.preventDefault();" onmousedown="event.stopPropagation();">
                    </span>
                  </span>
                </label>
                @endforeach
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                Interests & Hobbies
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 15px;">Type your interests and press Enter to add them.</p>
              
              <style>
                  .tag-container {
                      display: flex;
                      flex-wrap: wrap;
                      gap: 8px;
                      padding: 8px;
                      border: 1px solid #E2E8F0;
                      border-radius: 8px;
                      background: #FFF;
                      min-height: 42px;
                  }
                  .tag-container:focus-within {
                      border-color: #E91E63;
                  }
                  .tag-item {
                      background: #FDF2F8;
                      border: 1px solid #FCE7F3;
                      color: #E91E63;
                      padding: 4px 12px;
                      border-radius: 20px;
                      font-size: 13px;
                      display: flex;
                      align-items: center;
                      gap: 6px;
                      font-weight: 500;
                  }
                  .tag-item .remove-tag {
                      cursor: pointer;
                      font-weight: bold;
                      font-size: 16px;
                      line-height: 1;
                      color: #E91E63;
                  }
                  .tag-input {
                      border: none;
                      outline: none;
                      flex: 1;
                      min-width: 150px;
                      font-size: 14px;
                      background: transparent;
                      padding: 4px;
                      color: #1E293B;
                  }
              </style>
              
              <div class="tag-container" id="interestsContainer">
                  @foreach(old('interests', $user->interests ?? []) as $interest)
                      <div class="tag-item">
                          <span>{{ $interest }}</span>
                          <span class="remove-tag" onclick="this.parentElement.remove(); updateInterestsInput();">&times;</span>
                      </div>
                  @endforeach
                  <input type="text" class="tag-input" id="interestInput" placeholder="Type an interest and press Enter">
              </div>
              <div id="hiddenInterests">
                  @foreach(old('interests', $user->interests ?? []) as $interest)
                      <input type="hidden" name="interests[]" value="{{ $interest }}">
                  @endforeach
              </div>
              
              <script>
                  document.addEventListener('DOMContentLoaded', function() {
                      const input = document.getElementById('interestInput');
                      input.addEventListener('keydown', function(e) {
                          if (e.key === 'Enter') {
                              e.preventDefault(); // Prevent form submission
                              const val = this.value.trim();
                              if (val) {
                                  // Create tag UI
                                  const tagItem = document.createElement('div');
                                  tagItem.className = 'tag-item';
                                  tagItem.innerHTML = '<span>' + val + '</span> <span class="remove-tag" onclick="this.parentElement.remove(); updateInterestsInput();">&times;</span>';
                                  this.parentElement.insertBefore(tagItem, this);
                                  
                                  this.value = '';
                                  updateInterestsInput();
                              }
                          }
                      });
                  });

                  function updateInterestsInput() {
                      const container = document.getElementById('interestsContainer');
                      const tags = container.querySelectorAll('.tag-item span:first-child');
                      const hiddenContainer = document.getElementById('hiddenInterests');
                      hiddenContainer.innerHTML = '';
                      tags.forEach(tag => {
                          const val = tag.textContent.trim();
                          hiddenContainer.innerHTML += '<input type="hidden" name="interests[]" value="' + val + '">';
                      });
                  }
              </script>
            </div>

            <!-- Other Details -->
            <div class="card">
              <div class="card-header">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Other Details
              </div>
              <p style="font-size: 13px; color: #64748B; margin-top: -15px; margin-bottom: 10px;">Add any additional information.</p>
              <textarea name="other_details" class="form-control" style="height: 80px;">{{ old('other_details', $user->other_details ?? 'I love meeting new people and creating beautiful memories together.') }}</textarea>
              <div class="char-count">72/500</div>

              <div class="form-group" style="margin-top: 20px;">
                <label>Account Status</label>
                <select name="is_active" class="form-control">
                  <option value="1" {{ old('is_active', $user->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                  <option value="0" {{ old('is_active', $user->is_active ?? 1) == 0 ? 'selected' : '' }}>Deactivated</option>
                </select>
                <div style="font-size: 11px; color: #94A3B8; margin-top: 5px;">Deactivating your account will hide it from other users.</div>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="button" class="btn-cancel">Cancel</button>
            <button type="submit" class="btn-save">
              <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
              Save Changes
            </button>
          </div>

        </form>
      </div>

      <!-- Right Column -->
      <div class="right-col">
        <!-- Preview Card -->
        <div class="card preview-card">
          <div style="padding: 15px 20px; font-weight: 700; color: #1E293B; display: flex; align-items: center; gap: 8px;">
            <svg width="18" height="18" fill="none" stroke="#E91E63" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            Profile Preview
          </div>
          @if($user->profile_image)
            <img src="{{ asset('storage/' . $user->profile_image) }}" class="preview-img">
          @else
            <div style="height: 250px; background: #E2E8F0; display: flex; align-items: center; justify-content: center; color: #94A3B8;">No Image</div>
          @endif
          <div class="preview-content">
            <h3 class="preview-name">
              {{ $user->name ?? 'Your Name' }}
              <svg width="18" height="18" fill="#E91E63" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </h3>
            
            @php
                $age = $user->dob ? \Carbon\Carbon::parse($user->dob)->age : 'N/A';
            @endphp
            <div class="preview-meta">{{ $age }} • {{ $user->height ?? "Height N/A" }} • <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> {{ $user->city ?? 'City N/A' }}</div>
            
            <div class="preview-rating">
              <svg width="14" height="14" fill="#FBBF24" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              New Partner <span style="color: #94A3B8; font-weight: normal;">(0 Reviews)</span>
            </div>

            <div class="preview-tags">
              @php
                  $interests = is_array($user->interests) ? $user->interests : (is_string($user->interests) ? json_decode($user->interests, true) : []);
              @endphp
              @forelse($interests ?? [] as $tag)
                <span class="preview-tag">{{ $tag }}</span>
              @empty
                <span class="preview-tag" style="color:#94A3B8; background:transparent; border:none; padding:0;">No interests added</span>
              @endforelse
            </div>

            <div class="preview-desc">
              {{ $user->bio ?? 'No bio provided yet.' }}
            </div>

            <div class="preview-details">
              @php
                  $langs = is_array($user->languages) ? implode(', ', $user->languages) : (is_string($user->languages) ? implode(', ', json_decode($user->languages, true) ?? []) : 'Not specified');
                  $langs = empty($langs) ? 'Not specified' : $langs;
                  
                  $availDays = [];
                  $availabilities = is_array($user->availability) ? $user->availability : (json_decode($user->availability, true) ?? []);
                  foreach($availabilities as $day => $data) {
                      if(isset($data['active']) && $data['active']) {
                          $availDays[] = $day;
                      }
                  }
                  $availString = count($availDays) > 0 ? count($availDays) . ' Days/Week' : 'Not specified';
              @endphp
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ ucfirst($user->gender ?? 'Not specified') }}</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> Age: {{ $age }}</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg> {{ \Illuminate\Support\Str::limit($langs, 20) }}</div>
              <div><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $availString }}</div>
              <div style="grid-column: span 2;"><svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Within 1 hour</div>
            </div>
          </div>
        </div>

        <!-- Tips Card -->
        <div class="card tips-card">
          <div style="font-weight: 700; color: #E91E63; display: flex; align-items: center; gap: 8px; margin-bottom: 15px;">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            Profile Tips
          </div>
          <ul class="tips-list">
            <li>Use clear and recent photos.</li>
            <li>Write a genuine and positive bio.</li>
            <li>Mention your interests and hobbies.</li>
            <li>Keep your profile updated for better matches.</li>
          </ul>
          <div class="tips-signature">
            Be Real<br>Be You <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function togglePriceInput(checkbox, inputId) {
        const inputSpan = document.getElementById(inputId);
        if(checkbox.checked) {
            inputSpan.style.display = 'inline-flex';
            // Auto focus the input when checked
            setTimeout(() => {
                inputSpan.querySelector('input').focus();
            }, 50);
        } else {
            inputSpan.style.display = 'none';
        }
    }

    // Add simple toggle logic for the pill checkboxes UI
    document.querySelectorAll('.pill-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const icon = this.nextElementSibling.querySelector('svg');
        if(this.checked) {
          icon.style.display = 'inline-block';
        } else {
          icon.style.display = 'none';
        }
      });
    });
  </script>

@endsection
