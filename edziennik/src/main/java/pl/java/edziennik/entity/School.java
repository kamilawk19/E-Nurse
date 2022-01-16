package pl.java.edziennik.entity;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

import javax.persistence.*;

@Entity
@Table(name = "schools")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class School extends BaseEntity {
    @Column(nullable = false)
    private String name;

    @OneToOne(fetch = FetchType.LAZY, cascade = CascadeType.PERSIST, optional = false)
    private Address address;
}
