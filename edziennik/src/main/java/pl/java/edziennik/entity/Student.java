package pl.java.edziennik.entity;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;
import java.time.LocalDate;

@Entity
@Table(name = "students")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class Student extends BaseEntity {
    @Column(length = 11)
    private String pesel;

    @Column(nullable = false, length = 25)
    private String firstName;

    private String secondName;

    @Column(nullable = false, length = 30)
    private String lastName;

    @Column(nullable = false, length = 25)
    private String nationality;

    @Column(nullable = false)
    private LocalDate birthDate;

    @Column(nullable = false, length = 1)
    private String sex;

    @Column(nullable = false, length = 9)
    private String phoneNumber;

    @Column(nullable = false, length = 50)
    private String email;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "school_id")
    private School school;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "address_id")
    private Address address;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "class_id")
    private SchoolClass schoolClass;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "user_id")
    private AppUser appUser;

    @OneToOne(fetch = FetchType.LAZY, optional = false, cascade = CascadeType.PERSIST)// TODO: sql insert data
    private Parent parent;
}
