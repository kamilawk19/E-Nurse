package pl.java.edziennik.entity;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;

@Entity
@Table(name = "no_pesel")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class NoPesel {
    @Id
    @Column(name = "student_id")
    private Long id;

    @OneToOne
    @MapsId
    @JoinColumn(name = "student_id")
    private Student student;

    @Column(nullable = false, length = 50)
    private String documentName;

    @Column(nullable = false, length = 25)
    private String documentNumber;
}
