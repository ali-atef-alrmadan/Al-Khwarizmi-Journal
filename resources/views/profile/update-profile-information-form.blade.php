<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('معلومات الحساب الشخصي') }}
    </x-slot>

    <x-slot name="description">
        {{ __('قم بتحديث معلومات حسابك وعنوان بريدك الإلكتروني.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('الصورة الشحصية') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('أختار صورة جديدة') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('حذف الصورة') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('الأسم') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('البريد الإلكتروني') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- degree -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="degree" value="{{ __('الدرجة العلمية') }}" />
            <select name="degree" id="degree" wire:model.defer="state.degree" class="w-full p-2 mb-2 border border-indigo-100 rounded-md focus:border-indigo-500">
                <option value="{{ $state['degree'] }}" selected>
                    {{ $state['degree'] }}
                </option>
                @if($state['degree'] !== 'طالب')
                    <option value="طالب">طالب</option>
                @endif
                @if($state['degree'] !== 'دبلوم')
                    <option value="دبلوم">دبلوم</option>
                @endif
                @if($state['degree'] !== 'بكلوريوس')
                    <option value="بكلوريوس">بكلوريوس</option>
                @endif
                @if($state['degree'] !== 'ماستر')
                    <option value="ماستر">ماستر</option>
                @endif
                @if($state['degree'] !== 'دكتوراه')
                    <option value="دكتوراه">دكتوراه</option>
                @endif
            </select>
        </div>

        <!-- Prefix -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="prefix" value="{{ __('الرتبة العلمية') }}"/>
            <select name="prefix" id="prefix" wire:model.defer="state.prefix" class="w-full p-2 mb-2 border border-indigo-100 rounded-md focus:border-indigo-500">
                <option value="{{ $state['prefix'] }}" selected>
                    {{ $state['prefix'] }}
                </option>
                @if($state['prefix'] !== 'لا شيء')
                    <option value="لا شيء">لا شيء</option>
                @endif
                @if($state['prefix'] !== 'مدرس')
                    <option value="مدرس">مدرس</option>
                @endif
                @if($state['prefix'] !== 'أستاذ مساعد')
                    <option value="أستاذ مساعد">أستاذ مساعد</option>
                @endif
                @if($state['prefix'] !== 'أستاذ مشارك')
                    <option value="أستاذ مشارك">أستاذ مشارك</option>
                @endif
                @if($state['prefix'] !== 'أستاذ')
                    <option value="أستاذ">أستاذ</option>
                @endif
                @if($state['prefix'] !== 'دكتور')
                    <option value="دكتور">دكتور</option>
                @endif
            </select>
        </div>

        <!-- Institution -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="Institution" value="{{ __('مكان العمل') }}" />
            <x-jet-input id="Institution" type="text" class="mt-1 block w-full" wire:model.defer="state.Institution"/>
            <x-jet-input-error for="Institution" class="mt-2" />
        </div>

        <!-- birth_date -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birth_date" value="{{ __('تاريخ الميلاد') }}" />
            <x-jet-input id="birth_date" type="date" class="mt-1 block w-full" wire:model.defer="state.birth_date"/>
            <x-jet-input-error for="birth_date" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('تم حفظ التغييرات') }}
        </x-jet-action-message>

        <x-jet-button class="w-min px-10" wire:loading.attr="disabled" wire:target="photo">
            {{ __('حفظ') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
