@if ($errors->any())
    <div  class="w-full">
        <ul dir="rtl" class="mt-3 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                @if ($error == 'تم إرسال البحث بنجاح.'
                    || $error == 'تم إرسال تقييم البحث بنجاح.'
                    || $error == 'تم نشر البحث بنجاح.'
                    || $error == 'تم رفض البحث بنجاح.'
                    || $error == 'تم ترقية الباحث الى محكم بنجاح.'
                    || $error == 'تم حذف العضو بنجاح.')
                    <div class="bg-green-500 text-white p-5 rounded-lg">
                        <li>
                            {{ $error }}
                        </li>
                    </div>
                @else
                    <div class="bg-red-500 text-white p-5 rounded-lg mt-2">
                        <li>
                            @if($error == 'The address file must be a file of type: pdf.')
                                <?php
                                    $error = 'يجب على الملف المرفق ان يكون بصيغة pdf.';
                                ?>
                            @endif
                            @if($error == 'The birth date must be a date before -18 years.')
                                <?php
                                    $error = 'يجب ان يكون عمر المستخدم 18 او أكبر.';
                                ?>
                            @endif
                            @if($error == 'The prefix field is required.')
                                <?php
                                    $error = 'لا يمكنك ترك حقل الرتبة العلمية فارغ.';
                                ?>
                            @endif
                            @if($error == 'The degree field is required.')
                                <?php
                                    $error = 'لا يمكنك ترك حقل الدرجة العلمية فارغ.';
                                ?>
                            @endif
                            @if($error == 'The password must be at least 8 characters.')
                                <?php
                                    $error = 'يجب على كلمة المرور ان تكون على الأقل 8 أحرف.';
                                ?>
                            @endif
                            @if($error == 'The country field is required.')
                                <?php
                                    $error = 'لا يمكنك ترك حقل الدولة فارغ.';
                                ?>
                            @endif
                            @if($error == 'The type research field is required.')
                                <?php
                                    $error = 'لا يمكنك ترك حقل نوع البحث فارغ.';
                                ?>
                            @endif
                            @if($error == 'The file must be a file of type: pdf.')
                                <?php
                                    $error = 'يجب على الملف المرفق ان يكون بصيغة pdf.';
                                ?>
                            @endif
                            {{ $error }}
                            <?php
                                break;
                            ?>
                        </li>
                    </div>
                @endif

            @endforeach
        </ul>
    </div>
@endif
