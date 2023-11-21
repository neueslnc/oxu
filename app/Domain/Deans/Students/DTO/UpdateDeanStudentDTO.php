<?php

namespace App\Domain\Deans\Students\DTO;

use App\Domain\Deans\Students\Models\Student;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class UpdateDeanStudentDTO
{
    /**
     * @var int
     */
    private int $student_id;

    /**
     * @var int|null
     */
    private ?int $sex_id = null;

    /**
     * @var int
     */
    private int $group_id;

    /**
     * @var string
     */
    private string $full_name;

    /**
     * @var string
     */
    private string $number_phone;

    /**
     * @var int
     * ta'lim tili
     */
    private int $language_id;

    /**
     * @var int
     * ta'lim shakli
     */
    private int $type_of_education_id;

    /**
     * @var int
     * ta'lim yo'nalishi
     */
    private int $direction_id;

    /**
     * @var int
     * ta'lim kursi
     */
    private int $student_course_id;

    /**
     * @var int
     * ta'lim turi
     */
    private int $form_of_education_id;

    /**
     * @var string|null
     */
    private ?string $passport_series = null;

    /**
     * @var int|null
     */
    private ?int $passport_pinfl = null;

    /**
     * @var int|null
     */
    private ?int $hemis_id = null;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var string|null
     */
    private ?string $birthday = null;
    private ?string $father_fio = null;
    private ?string $mather_fio = null;
    private ?string $father_phone = null;
    private ?string $mather_phone = null;
    private ?string $address = null;
    private ?string $address_temporarily = null;
    private ?string $deprived_of_parental = null;
    private ?string $disabled = null;
    private ?string $social_security = null;
    private ?string $court = null;
    private ?string $workplace = null;

    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $file = null;

    /**
     * @param array $data
     * @return UpdateDeanStudentDTO
     */
    public static function fromArray(array $data): UpdateDeanStudentDTO
    {
        $dto = new self();
        $dto->setStudentId($data['student_id']);
        $dto->setFullName($data['full_name']);
        $dto->setNumberPhone($data['number_phone'] ?? null);
        $dto->setFatherFio($data['father_fio'] ?? null);
        $dto->setMatherFio($data['mather_fio'] ?? null);
        $dto->setFatherPhone($data['father_phone'] ?? null);
        $dto->setMatherPhone($data['mather_phone'] ?? null);
        $dto->setAddress($data['address'] ?? null);
        $dto->setAddressTemporarily($data['address_temporarily'] ?? null);
        $dto->setDeprivedOfParental($data['deprived_of_parental'] ?? null);
        $dto->setDisabled($data['disabled'] ?? null);
        $dto->setSocialSecurity($data['social_security'] ?? null);
        $dto->setCourt($data['court'] ?? null);
        $dto->setWorkplace($data['workplace'] ?? null);
        $dto->setLanguageId($data['language_id']);
        $dto->setTypeOfEducationId($data['type_of_education_id']);
        $dto->setDirectionId($data['direction_id']);
        $dto->setStudentCourseId($data['student_course_id']);
        $dto->setFormOfEducationId($data['form_of_education_id']);
        $dto->setUser($data['user']);
        $dto->setGroupId($data['group_id']);
        $dto->setPassportSeries($data['passport_series'] ?? null);
        $dto->setPassportPinfl($data['passport_pinfl'] ?? null);
        $dto->setHemisId($data['hemis_id'] ?? null);
        $dto->setSexId($data['sex_id'] ?? null);
        $dto->setFile($data['img_path'] ?? null);
        $dto->setBirthday($data['birthday'] ?? null);

        return $dto;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     */
    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }

    /**
     * @return int|null
     */
    public function getHemisId(): ?int
    {
        return $this->hemis_id;
    }

    /**
     * @param int|null $hemis_id
     */
    public function setHemisId(?int $hemis_id): void
    {
        $this->hemis_id = $hemis_id;
    }

    /**
     * @return int|null
     */
    public function getSexId(): ?int
    {
        return $this->sex_id;
    }

    /**
     * @param int|null $sex_id
     */
    public function setSexId(?int $sex_id): void
    {
        $this->sex_id = $sex_id;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->group_id;
    }

    /**
     * @param int $group_id
     */
    public function setGroupId(int $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->student_id;
    }

    /**
     * @param int $student_id
     */
    public function setStudentId(int $student_id): void
    {
        $this->student_id = $student_id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getNumberPhone(): string
    {
        return $this->number_phone;
    }

    /**
     * @param string $number_phone
     */
    public function setNumberPhone(string $number_phone): void
    {
        $this->number_phone = $number_phone;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int
    {
        return $this->language_id;
    }

    /**
     * @param int $language_id
     */
    public function setLanguageId(int $language_id): void
    {
        $this->language_id = $language_id;
    }

    /**
     * @return int
     */
    public function getTypeOfEducationId(): int
    {
        return $this->type_of_education_id;
    }

    /**
     * @param int $type_of_education_id
     */
    public function setTypeOfEducationId(int $type_of_education_id): void
    {
        $this->type_of_education_id = $type_of_education_id;
    }

    /**
     * @return int
     */
    public function getDirectionId(): int
    {
        return $this->direction_id;
    }

    /**
     * @param int $direction_id
     */
    public function setDirectionId(int $direction_id): void
    {
        $this->direction_id = $direction_id;
    }

    /**
     * @return int
     */
    public function getStudentCourseId(): int
    {
        return $this->student_course_id;
    }

    /**
     * @param int $student_course_id
     */
    public function setStudentCourseId(int $student_course_id): void
    {
        $this->student_course_id = $student_course_id;
    }

    /**
     * @return int
     */
    public function getFormOfEducationId(): int
    {
        return $this->form_of_education_id;
    }

    /**
     * @param int $form_of_education_id
     */
    public function setFormOfEducationId(int $form_of_education_id): void
    {
        $this->form_of_education_id = $form_of_education_id;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getPassportSeries(): ?string
    {
        return $this->passport_series;
    }

    /**
     * @param string|null $passport_series
     */
    public function setPassportSeries(?string $passport_series): void
    {
        $this->passport_series = $passport_series;
    }

    /**
     * @return int|null
     */
    public function getPassportPinfl(): ?int
    {
        return $this->passport_pinfl;
    }

    /**
     * @param int|null $passport_pinfl
     */
    public function setPassportPinfl(?int $passport_pinfl): void
    {
        $this->passport_pinfl = $passport_pinfl;
    }

    /**
     * @return string|null
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * @param string|null $birthday
     */
    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string|null
     */
    public function getFatherFio(): ?string
    {
        return $this->father_fio;
    }

    /**
     * @param string|null $father_fio
     */
    public function setFatherFio(?string $father_fio): void
    {
        $this->father_fio = $father_fio;
    }

    /**
     * @return string|null
     */
    public function getMatherFio(): ?string
    {
        return $this->mather_fio;
    }

    /**
     * @param string|null $mather_fio
     */
    public function setMatherFio(?string $mather_fio): void
    {
        $this->mather_fio = $mather_fio;
    }

    /**
     * @return string|null
     */
    public function getFatherPhone(): ?string
    {
        return $this->father_phone;
    }

    /**
     * @param string|null $father_phone
     */
    public function setFatherPhone(?string $father_phone): void
    {
        $this->father_phone = $father_phone;
    }

    /**
     * @return string|null
     */
    public function getMatherPhone(): ?string
    {
        return $this->mather_phone;
    }

    /**
     * @param string|null $mather_phone
     */
    public function setMatherPhone(?string $mather_phone): void
    {
        $this->mather_phone = $mather_phone;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getAddressTemporarily(): ?string
    {
        return $this->address_temporarily;
    }

    /**
     * @param string|null $address_temporarily
     */
    public function setAddressTemporarily(?string $address_temporarily): void
    {
        $this->address_temporarily = $address_temporarily;
    }

    /**
     * @return string|null
     */
    public function getDeprivedOfParental(): ?string
    {
        return $this->deprived_of_parental;
    }

    /**
     * @param string|null $deprived_of_parental
     */
    public function setDeprivedOfParental(?string $deprived_of_parental): void
    {
        $this->deprived_of_parental = $deprived_of_parental;
    }

    /**
     * @return string|null
     */
    public function getDisabled(): ?string
    {
        return $this->disabled;
    }

    /**
     * @param string|null $disabled
     */
    public function setDisabled(?string $disabled): void
    {
        $this->disabled = $disabled;
    }

    /**
     * @return string|null
     */
    public function getSocialSecurity(): ?string
    {
        return $this->social_security;
    }

    /**
     * @param string|null $social_security
     */
    public function setSocialSecurity(?string $social_security): void
    {
        $this->social_security = $social_security;
    }

    /**
     * @return string|null
     */
    public function getCourt(): ?string
    {
        return $this->court;
    }

    /**
     * @param string|null $court
     */
    public function setCourt(?string $court): void
    {
        $this->court = $court;
    }

    /**
     * @return string|null
     */
    public function getWorkplace(): ?string
    {
        return $this->workplace;
    }

    /**
     * @param string|null $workplace
     */
    public function setWorkplace(?string $workplace): void
    {
        $this->workplace = $workplace;
    }
}
